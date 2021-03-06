"use strict";

/** This object contains the necessary functions to create the 'view' of the word search,
 * which essentially refers to displaying the puzzle and handling mouse events!
 *
 * @author Noor Aftab
 * 
 * @param {Array[]} matrix - 2D array containing the filled word search grid
 * @param {Array[]} list - 2D array containing the list of words in the grid
 * @param {String} gameId - div ID for the word search container
 * @param {String} listId - div ID for the container displaying list of words to find
 * @param {String} instructionsId - ID for the h2 heading, to update as necessary
 */

function WordSearchView(matrix, list, gameId, listId, instructionsId) {

	"use strict";

	//variable to store if the puzzle was solved by the player or by the solve button!
	var selfSolved = true;

	//object to hold oft-used class/id/attribute names!
	var names = {

		cell: "cell",
		pivot: "pivot",
		selectable: "selectable",
		selected: "selected",
		path: "path"

	};

	//object to hold oft-used class/id selectors 
	var select = {

		cells: "." + names.cell,
		pivot: "#" + names.pivot,
		selectable: "." + names.selectable,
		selected: "." + names.selected

	};

	var searchGrid = {

		row: "row",
		column: "column"

	};

	/* creates the word search puzzle grid and the table containing the list
	 * of words to find
	 */
	this.setUpView = function () {

		createSearchGrid(matrix, names.cell, searchGrid.row, searchGrid.column, gameId);
		createListOfWords(list, listId);

	}

	/** used strings because it was easy enough for a small program like this, wanted
	to explore jQuery's capabilities! **/

	/** used buttons because <td> would expand when adding border when found - stylistic purposes**/

	/** this funcion makes a 'table' of divs to store each letter in the matrix of letters
	 * created in wordsearchlogic.js
	 *
	 * @param {Array[]} matrix
	 * @param {String} cellName
	 * @param {String} rowAttr
	 * @param {String} colAttr
	 * @param {String} boardId
	 */
	function createSearchGrid(matrix, cellName, rowAttr, colAttr, boardId) {

		//loops through rows
		for (var i = 0; i < matrix.length; i++) {

			//creates a div for the table row and gives it a row class
			var row = $("<div/>");
			row.attr({ class: "boardRow" });  //only really used once, so it's not in a variable

			//loops through columns
			for (var j = 0; j < matrix[i].length; j++) {

				//each letter in the row is a button element
				var letter = $("<button/>");  //i hearbuttons are preferred for clickable actions

				//the letter is given a cell class, and given row and column attributes!
				letter.attr({
					class: cellName,
					[rowAttr]: i,
					[colAttr]: j
				}).text(matrix[i][j]); //sets text of button to the respective matrix index

				//adds letter to the larger row element
				letter.appendTo(row);

			}

			//adds the row of letters to the larger game board element
			row.appendTo($(boardId));
		}

	}

	/** This function creates a table-type object to insert all the words
	 * contained in the word search puzzle! players refer to this table
	 * when looking for words to find 
	 *
	 * @param {Array[]} wordList a matrix of words to insert into list container
	 * @param {String} wordListId the ID of the container! 
	 */
	function createListOfWords(wordList, wordListId) {

		//loops through rows
		for (var i = 0; i < wordList.length; i++) {

			//creates a div for the row
			var row = $("<div/>");
			row.attr({ class: "listRow" }); //gives the rows a list row class

			//loops through columns
			for (var j = 0; j < wordList[i].length; j++) {

				//each individual word is a list item element!
				var word = $("<li/>");

				//they're given a list word class, and an attribute containing it's trimmed text (as in the puzzle)
				word.attr({ class: "listWord", text: wordList[i][j].replace(/\W/g, "") });

				//given text from it's respected list index
				word.text(wordList[i][j]);

				//added to the larger list row element
				word.appendTo(row);

			}

			//row of words added to the larger word list div
			row.appendTo($(wordListId));

		}

	}

	/** this function solves the puzzle for the player!
	 *
	 * @param {Object} loc an object containing the locations of all the words to find in the puzzle!
	 * @param {Array[]} matrix the grid in which the words are placed in!
	 */
	this.solve = function (wordLoc, matrix) {

		/** converts the object into an array and loops through each index to find 
		 * the word with the coordinates/orientation properties, setting the words to found!
		 *
		 * @param {String} word - the (trimmed) word placed in the puzzle
		 */
		Object.keys(wordLoc).forEach(function (word) {

			//path of the word
			var p = wordLoc[word].p;

			//the x and y value the word starts from
			var startX = wordLoc[word].x;
			var startY = wordLoc[word].y;

			/** initialized variables: k - for word length
			 *						   x - for starting x/row
			 *						   y - for starting y/column
			 *
			 * conditions: k - less than total length of word
			 *
			 * increments: k - incremented by 1, 
			 *			   x & y - incremented by x & y functions for path p inside  
			 *			   object 'incr'
			 */
			for (var k = 0, x = startX, y = startY; k < word.length; k++, x = incr[p](x, y).x, y = incr[p](x, y).y) {

				//finds the puzzle cell with the respective x and y value and sets it as found
				$(select.cells + "[row = " + x + "][column = " + y + "]").addClass("found");

			}

			//set to false since the program solved it for the player
			selfSolved = false;

			//checks if valid word made (which it was)
			validWordMade(list, word, instructionsId);

		});

	}

	/** this function encapsulates all the mouse events for making a move by breaking it down 
	 * into three main parts: pressing the mouse down (mousedown), dragging it (mouseenter), 
	 * and finally releasing the mouse (mouseup)!
	 */
	this.triggerMouseDrag = function () {

		//empty array to store the selected cells in a move
		var selectedLetters = [];

		// //empty string to store the word made by a 
		var wordMade = '';

		//variable to store if the mouse is down
		var mouseIsDown = false;

		/** executes when the mouse is pressed down on a letter in the 
		 * search grid
		 */
		$(select.cells).mousedown(function () {

			//sets true that mouse is down
			mouseIsDown = true;

			//selects the pressed cell
			$(this).addClass(names.selected);

			//sets the pressed cell to be the 'pivot' of the move
			$(this).attr({ id: names.pivot });

			//highlights all the possible paths the user may go to select more letters
			highlightValidDirections($(this), matrix, names.selectable);

		});

		/** this code executes when the mouse is down and the user starts moving their
		 * mouse inside the puzzle container!
		 */
		$(select.cells).mouseenter(function () {

			//ensures the mouse is down and the cell the mouse is on is on a valid path
			if (mouseIsDown && $(this).hasClass(names.selectable)) {

				//holds the direction of the path the mouse is currently on
				var currentDirection = $(this).attr(names.path);

				//unselects selected cells
				for (var i = 0; i < selectedLetters.length; i++) {

					selectedLetters[i].removeClass(names.selected);

				}

				//empties the array of selected letters
				selectedLetters = [];

				//empties string of the word being constructed 
				wordMade = '';

				//resets the range of cells to select
				var cells = selectCellRange(select.cells, $(this), names.path, currentDirection, selectedLetters, wordMade);

				wordMade = cells.word;
				selectedLetters = cells.array;

			}

		});

		/** this code calls the endMove function when the mouse is released - it mostly checks 
		 * the word made and whether it's a word to be found, as well as resetting variables 
		 * to allow another move 
		 */
		$(select.cells).mouseup(function () {

			endMove();

		});

		/** if the user is playing the game and moves their mouse out of the word grid, this function
		 * makes it so that the move automatically ends - this makes pressing the mouse down and 
		 * accidentally/purposely leaving the board less annoying to deal with!
		 */
		$(gameId).mouseleave(function () {

			if (mouseIsDown) { //checks that the user is indeed pressing their mouse down (therefore, playing)

				endMove();

			}

		});

		/** this function handles everything ending a move should consist of - resetting variables
		 * for a new move and checking if a proper word to find has been made
		 */
		function endMove() {

			//sets mouse down as false since the mouse is now up
			mouseIsDown = false;

			//checks if a word on the list was selected
			if (validWordMade(list, wordMade, instructionsId)) {

				$(select.selected).addClass("found");

			}

			//unselects any selected letters
			$(select.selected).removeClass(names.selected);

			//removes the direction attributes of any cells (prevents strange behavior)
			$(select.cells).removeAttr(names.path);

			//removes the pivot's ID so a new pivot can be selected 
			$(select.pivot).removeAttr("id");

			//remove selectability of selectable cells 
			$(select.selectable).removeClass(names.selectable);

			//empties the word string and selected cells' array
			wordMade = '';
			selectedLetters = [];

		}

	}

	/* highlights all the valid directions in the matrix from where mouse is first clicked, like
	 * top -> bottom, left -> right, and both diagonals!
	 *
	 * @param {jQuery} selectedCell - DOM element the mouse pressed down on (a cell in the word search puzzle!)
	 * @param {Array[]} matrix - the puzzle 2D array
	 * @param {String} makeSelectable - selector to make an element selectable
	 */
	function highlightValidDirections(selectedCell, matrix, makeSelectable) {

		//gets the row and column of where the cell the mouse pressed on is
		var cellRow = parseInt(selectedCell.attr(searchGrid.row));
		var cellCol = parseInt(selectedCell.attr(searchGrid.column));

		//converts the global paths object into an array
		Object.keys(paths).forEach(function (path) { //path - each property's name (e.g. 'vert', 'priDiagBack')

			//makes each cell in each of the paths selectable
			makeRangeSelectable(cellRow, cellCol, matrix.length, paths[path], makeSelectable);

		});

	}

	/** this functions makes a given path selectable but giving each cell in the path a 'selectable' class! 
	 * this makes it so that the player can only select cells on specific paths (which makes selecting vertically, 
	 * horizontally, and diagonally much less of a hassle!)
	 *
	 * @param {Number} x - starting x-coordinate/row of the path
	 * @param {Number} y - starting y-coordinate/column of the path
	 * @param {Number} l - length/size of the matrix
	 * @param {String} p - name of the path (e.g. vertical, primaryDiagonalBackwards)
	 * @param {String} selectable - selector to make a DOM element selectable
	 */
	function makeRangeSelectable(x, y, l, p, selectable) {

		/** initialized variables: x - starting row, incremented to exclude the pivot
		 *						   y - starting column, incremented to exclude the pivot					   
		 *
		 * condition: x & y to stay within recommended bounds for path p 
		 *			  (determined by object bounds)
		 *
		 * increments: x & y - incremented by function determined for path p (by  
		 *			   object 'incr')
		 */
		for (var i = incr[p](x, y).x, j = incr[p](x, y).y;  //initialized variables
			bounds[p](i, j, l);  							//condition
			i = incr[p](i, j).x, j = incr[p](i, j).y) {		//increments

			//select the specific DOM elements with the specific row/column attribute values
			$("[" + searchGrid.row + "= " + i + "][" + searchGrid.column + "= " + j + "]")
				.addClass(selectable) //makes it selectable
				.attr({ [names.path]: p }); //gives it a path attribute with the value of p

		}

	}

	/** this function finds and selects the range of cells from the pivot (first selected cell) to
	 * the cell the mouse is currenty hovering on, altogether going from end to end on the puzzle
	 * matrix
	 *
	 * @param {String} cellsSelector - selector name for cells in the search grid
	 * @param {Array} selectedCells
	 * @param {jQuery} hoveredCell - cell the mouse is hovering on
	 * @param {String} pathAttr - path/direction attribute 
	 * @param {String} path - value of the path attribute
	 * @param {String} wordConstructed - word user makes by dragging around on the puzzle
	 * @return returns an object containing: the word constructed and the array of selected DOM cells!
	 */
	function selectCellRange(cellsSelector, hoveredCell, pathAttr, path, selectedCells, wordConstructed) {

		//variable to hold index of cell hovered on
		var hoverIndex;

		//variable to hold index of pivot
		var pivotIndex;

		//selector for cells in the particular path the mouse is on
		var cellRange = cellsSelector + "[" + pathAttr + " =" + path + "]";

		//setting indices depending on how the paths flow
		switch (path) {

			case paths.vert:
			case paths.horizon:
			case paths.priDiag:
			case paths.secDiag:

				//hoverIndex > pivotIndex 
				hoverIndex = hoveredCell.index(cellRange) + 1;
				pivotIndex = 0;

				//sets up wordConstructed with the pivot's letter (to start it off)
				wordConstructed = $(select.pivot).text();

				//using the pivot text, selects cells and adds their text to wordConstructed
				wordConstructed = selectLetters(selectedCells, wordConstructed, cellRange, pivotIndex, hoverIndex);


				break;

			case paths.vertBack:
			case paths.horizonBack:
			case paths.priDiagBack:
			case paths.secDiagBack:

				//hoverIndex < pivotIndex
				hoverIndex = hoveredCell.index(cellRange);
				pivotIndex = $(cellRange).length;

				//selects range of cells between the pivot and the cell the mouse is on
				wordConstructed += selectLetters(selectedCells, wordConstructed, cellRange, hoverIndex, pivotIndex);

				//adds pivot text to the end
				wordConstructed += $(select.pivot).text();

				break;

		}

		return { word: wordConstructed, array: selectedCells };

	}

	/** this function selects the range of cells between the pivot cell and the
	 * the cell the mouse is hovered, and adds their text to the constructed word's string
	 *
	 * @param {Array} selectedCells - array to hold 
	 * @param {String} wordConstructed - word being created by user
	 * @param {String} range - the path on which to select cells
	 * @param {Number} lowerIndex - index of the lower cell
	 * @param {Number} upperIndex - index of the higher cell
	 * @return returns the word made during the selection process!
	 */
	function selectLetters(selectedCells, wordConstructed, range, lowerIndex, upperIndex) {

		//only goes through the the range between the pivot and wherever the mouse is on the path!
		$(range).slice(lowerIndex, upperIndex).each(function () {

			//selects the cell
			$(this).addClass(names.selected);

			//adds it to the array of cells
			selectedCells.push($(this));

			//updates the word being made to include the newest cell's letter
			wordConstructed += $(this).text();

		});

		return wordConstructed;

	}

	/** checks if the word a user made after a move is an actual word to find, and 
	 * if so, sets the word as found! otherwise, nothing happens (so the move is 
	 * essentially ignored)
	 *
	 * @param {Array[]} wordList - matrix of words in the grid
	 * @param {String} wordToCheck - word to check for validity
	 * @param {String} instructionsId - selector for the h2 heading
	 * @return true if the word made is a word in the list
	 */
	function validWordMade(list, wordToCheck, instructionsId) {

		//loops through rows
		for (var i = 0; i < list.length; i++) {

			//loops through columns
			for (var j = 0; j < list[i].length; j++) {

				//trims the word at the index (to make comparison easier)
				var trimmedWord = list[i][j].replace(/\W/g, "")

				//if the word user made is the same as the trimmed word, or the reverse of it
				if (wordToCheck == trimmedWord ||
					wordToCheck == reversedWord(trimmedWord)) {

					//sets the word inside the list div as found (changes color, strikethroughs text)
					$(".listWord[text = " + trimmedWord + "]").addClass("found");

					//checks if the last word to find was found

					// mando la palabra encontrada para mostrar su significado
					mostrarSignificado(trimmedWord);


					checkPuzzleSolved(".listWord", ".listWord.found", instructionsId);

					return true;

				}else{

					$("#ds").text("Fallaste ????");

				}

			}

		}

	}

	/** checks if all the words in the puzzle have been found, what method was used to 
	 * solve the puzzle, and updates the h2 instructions heading accordingly
	 *
	 * @param {String} fullList - selector for words in the wordlist div
	 * @param {String} foundWordsList - selector found words in the wordlist div
	 * @param {String} instructionsId - selector for h2 instructions heading
	 * @return true if the entire word search has been solved
	 */
	function checkPuzzleSolved(fullList, foundWordsList, instructionsId) {

		//if all the words in the list to find have been found (no. of words to find == no. of found words)
		if ($(fullList).length == $(foundWordsList).length) {

			//if user solved the puzzle themselves
			if (selfSolved) {

				//updates h2 text
				$("#ds").text("??Felicidades! Completaste la sopa de letras! ????");
				$("#newGameButton").val("Intentalo de nuevo");



			}

			//if user used the solve button 
			else {

				//updates h2 text

				$("#ds").text("No te rindas, vuelve a intentarlo t?? mismo! ???_???");
				$("#newGameButton").val("Intentalo de nuevo");
			}

			return true;

		}

		return false;

	}

	/** reverses a string! (e.g. 'muscat' becomes 'tacsum')
	 *
	 * @param {String} word - word to reverse
	 * @return the reversed word
	 */
	function reversedWord(word) {

		//creates empty string to store reversed word
		var reversedWord = "";

		//loops through from end of word to the beginning (instead of traditional beginning to end)
		for (var i = word.length - 1; i >= 0; i--) {

			//adds the character to reversed word
			reversedWord += word.charAt(i);

		}

		return reversedWord;

	}

}





function mostrarSignificado(palabra) {

	// alert("acab??s de encontrar la palabra: "+palabra+" maje!");
	$("#ds").text("Exelente! ????");

	if(palabra == "NAWALES"){
		document.getElementById("imgpalabra").src = baseURL + "/storage/naw/E.png";
		
	}else{

		document.getElementById("imgpalabra").src = baseURL + "/storage/naw/" + palabra + ".png";

	}
	


	let definitions =
	{

		"BATZ": [["BAT'Z","Significa mono o hilo. Es el Nawal de todas las artes, de los tejidos, de los artistas. Es un d??a propicio para pedir pareja, amarrar o desatar cualquier asunto. Son maestros de todas las artes. Es Amable, Reservado, Tiene abundancia econ??mica, es Hogare??o y Protector de su familia."]],
		"AJ": [["AJ","Significa ca??a o ca??averal. Es el Nawal de la casa y de los ni??os, d??a propicio para el hogar y la salud de los ni??os. Nawal de las generaciones tiernas. Personas que no pueden negarse para otros. De car??cter dulce, oradores e investigadores, protector de la casa y ni??os, suerte para trabajos o negocios, respetuosos y aconsejadores."]],
		"IX": [["I'X","Significa jaguar. Es el Nawal de la naturaleza y los altares mayas, d??a para pedir fortaleza f??sica y mental. Es el nawal de las siete verg??enzas humanas: orgullo, ambici??n, envidia, mentira, crimen, ingratitud, ignorancia por pereza. Personas de razonamiento interno que les gusta la naturaleza y la soledad. Valerosos y fuertes, emprendedores, vigilantes, dador y cuidador de cosas, no pelea f??cilmente."]],
		"TZIKIN": [["TZI'IK'IN","Significa p??jaro. Es el Nawal del bienestar econ??mico, la buena fortuna, d??a propicio para agradecer y pedir el bienestar econ??mico. Es la comunicaci??n e intermediaci??n entre Uk??ux Kaj - Uk??ux Ulew el coraz??n del cielo y el coraz??n de la tierra. Personas que construyen su propio bienestar.	Buena suerte para cualquier trabajo, ??ntegros, de palabras santas, organizados y met??dicos, maestros que se auto forman."]],
		"AJMAQ": [["AJMAQ'","Significa b??ho, falta o culpa. Es el Nawal de todas las faltas, es el d??a de los abuelos que ya no est??n (difuntos). Es el d??a para pedir perd??n por las faltas. Personas valientes y de sangre dulce que f??cilmente caen en culpas. Prudentes y anal??ticos, equilibrados f??sica y espiritualmente, sabios, cae bien a cualquiera, percibe energ??as ocultas a otros."]],
		"TIJAX": [["TIJAX","Significa pedernal, obsidiana. Nawal de la muerte repentina y los sufrimientos. D??a propicio para curanderos y autoridades, para cortar males y enfermedades. Personas confrontativas que cortan toda clase de males y problemas. Poseen se??ales en el cuerpo, curanderos, se relacionan con todas las personas, negociadores y pol??ticos, muy amigables."]],
		"KAWOQ": [["KAWOQ","Significa trueno, dificultad. Es el Nawal de toda clase de pleitos, es el d??a de la mujer, d??a para curar enfermedades. Nawal de la piedra de cuarzo y de las semillas de Tz??it??. Personas creativas, defensoras de la mujer.	Visionarios, curanderos, inventores, perciben se??ales en los ojos de las personas, buen conversador."]],
		"AJPU": [["AJP??","Significa cerbatanero, se??or principal. Es el nawal de sol, d??a para pedir sabidur??a, talento y fortaleza f??sica. Nawal de las flores, la m??sica, el deporte, los cazadores y la agricultura. Personas l??deres, selectivas, buscan primero su beneficio.	Vencen toda maldad, curanderos con plantas, dirigentes de grupos, bienestar material, poseen sabidur??a y fuerza f??sica."]],
		"IMOX": [["IMOX","Significa pez, locura. El lado izquierdo. Es el nawal del mar, r??os y lagos, d??a para sanar enfermedades de la mente, para agradecer y pedir la lluvia, sanar enfermedades de la mente. El nawal de todos los lugares donde est?? el agua. No es el concepto de locura que conocemos com??nmente, es la capacidad de sentir lo que otros no sienten, por eso se dice que hablan locuras. Personas excelentes para el apoyo de trabajos, son quienes hacen el trabajo para otros. Fuerza invisible, inteligencia, articulaci??n l??gica, ayudan a las personas, de coraz??n limpio."]],
		"NOJ": [["NO'J","Significa idea, sabidur??a. Es el nawal de la inteligencia, d??a dedicado a pedir la sabidur??a, el talento, el buen pensamiento. Es el nawal del temblor o sismo. Personas muy creativas e imaginativas		Buenas ideas, valientes, facilidad para el di??logo, oradores e investigadores, intuitivos."]],
		"IQ": [["IQ'","Significa viento, luna. Es el nawal del aire y la luna, del esp??ritu del ser humano. D??a para alejar energ??as malas y enfermedades. Es el viento que limpia nuestra casa y nuestro cuerpo. Personas nobles que se involucran en los problemas de otros f??cilmente. Van y vienen de un lugar a otro, como el viento. Curanderos, comerciante, organizan cosas, alcanzan sus metas, inteligencia, so??adores."]],
		"AQABAL": [["AQ'AB'AL","Significa amanecer, aurora y mano.	Es el Nawal de la claridad, d??a para pedir que salga la luz en todas las cosas. El d??a de las personas que componen los huesos de los enfermos y de los curanderos con plantas. Personas que cumplen sus compromisos. Puntuales, responsables, curanderos, dan ideas a otros, amorosos y discretos"]],
		"KAT": [["KAT","Significa red, cautiverio, iguana. Es el Nawal de las c??rceles visibles e invisibles. Es guardador. Representa la red donde se guarda el ma??z y donde se atrapan los peces. D??a para pedir por los que est??n presos, para enredar y desenredar las cosas. Personas con mucho fuego en su ser. Manejan energ??as positivas y negativas. Quemadores de pom, investigadores, se auto forman, pescadores de todas las cosas, siempre consiguen cosas."]],
		"KAN": [["KAN","Significa serpiente emplumada. Es el Nawal de la creaci??n del hombre y la mujer. Es el due??o de todas las cosas materiales. D??a para pedir soluci??n a toda clase de problemas y necesidades. Personas con un alto sentido de la lealtad. Tienen poderes, buenos maestros y alumnos, sabidur??a, bienestar material, fil??sofos."]],
		"KEME": [["KEME","Significa renovaci??n, muerte, el due??o de la oscuridad. Es el Nawal de toda clase de muertes, d??a para pedir que se aleje la muerte. Se pide el descanso y paz de un moribundo. La Muerte no es mala, es el complemento de la vida, el descanso. Es el d??a para retira energ??as negativas en las personas. Personas con habilidad para las artes y oficios.	Psic??logos, responsables, pronosticadores, astucia, inteligencia, espirituales."]],
		"KEEJ": [["KEEJ","Significa venado, es la autoridad de la comunidad. Es el nawal de toda clase de animales cuadr??pedos. D??a para pedir fuerza para cargar con nuestras penas y alegr??as. Nawal de las cuatro esquinas del universo y cuatro rincones del mundo. D??a de los Ajq??ijab?? o sacerdotes mayas. Personas l??deres, dominantes con su pareja, les gusta la fama. Buen defensor de otros, bienestar econ??mico, trabajadores, responsables, cumplen las reglas."]],
		"QANIL": [["QANIL","Significa semilla, simiente, conejo. El planeta Venus. Es el nawal de toda clase de semillas animales y vegetales. D??a de la fertilidad y las cosechas, propicio para iniciar cualquier siembra o negocio. Significa los cuatro colores del ma??z: rojo, negro, blanco y amarillo. Personas de mano ??caliente?? a quienes todo lo que siembran les florece. ??giles, sumamente f??rtiles, psic??logos, comerciantes, buen car??cter."]],
		"TOJ": [["TOJ","Significa ofrenda, pago y lluvia.	Es el nawal de los cuatro se??ores del fuego, Tojil, Awilix, Jakawitz?? y Nikajtakaj. D??a propicio para nivelar o pagar cualquier deuda. D??a en que se agradece todo lo que recibimos en nuestra vida, lo bueno y lo malo. Personas con mucha sensibilidad para las artes y que lloran con facilidad.	Cumplidos en todo, acumulan riquezas, perciben las cosas, intermediarios, respetuosos."]],
		"TZI": [["TZ'I'","Significa perro, mapache. (Algunos abuelos tambi??n dicen que es TZ??IJ = palabra) Es el nawal de la justicia, la autoridad material y espiritual, el orden. D??a para pedir la soluci??n a los problemas ante los tribunales. D??a para alejar los vicios. Son las personas que hablan por otros. Los due??os de las leyes. Juzgan a los dem??s. L??deres, abogados y pol??ticos, oradores de buena palabra, cumplen sus metas, investigadores incansables."]],
		"NAWALES": [["E","Nawal es la energ??a, esp??ritu o fuerza de los seres y elementos de la naturaleza, los nawales son representados por elementos mismos de la naturaleza como el sol, la luna, la lluvia, el aire, el agua, las plantas y animales porque en el pensamiento maya todo tiene vida. (Por fines de jugablidad en la sopa de letras no se encuentra el nawal E, el cual corresponde al glifo mostrado en paralelo a este texto) E Significa camino o diente.	Es el Nawal de todos los caminos y dirigentes, del sistema nervioso y sangu??neo. D??a propicio para iniciar cualquier viaje o negocio. Son l??deres naturales. Propicia el bienestar de otros es viajero y caminante, orador y pensador, generoso, ense??a a los dem??s."]],
		"MAJBAL": [["Majb???al","Majb???al significa 0 en el idioma Maya K'ich?? y est?? representado por una concha"]],
		"JUN": [["Jun","Jun significa 1 en el idioma Maya K'ich?? y est?? representado por un punto"]],
		"KEB": [["Keb???","Keb??? significa 2 en el idioma Maya K'ich?? y est?? representado dos puntos"]],
		"OXIB": [["Oxib???","Oxib??? significa 3 en el idioma Maya K'ich?? y est?? representado tres puntos"]],
		"KAJIB": [["Kajib???","Kajib??? significa 4 en el idioma Maya K'ich?? y est?? representado cuatro puntos"]],
		"JOB": [["Job???","Job??? significa 5 en el idioma Maya K'ich?? y est?? representado por una linea horizontal"]],
		"WAQIB": [["Waqib???","Waqib??? significa 6 en el idioma Maya K'ich?? y est?? representado por una linea horizontal y un punto"]],
		"WUQUB": [["Wuqub???","Wuqub??? significa 7 en el idioma Maya K'ich?? y est?? representado por dos puntos y una linea horizontal"]],
		"WAJXAQIB": [["Wajxaqib???","Wajxaqib??? significa 8 en el idioma Maya K'ich?? y est?? representado por tres puntos y una linea horizontal"]],
		"BELEJEB": [["B???elejeb???","B???elejeb??? significa 9 en el idioma Maya K'ich?? y est?? representado por cuatro puntos y una linea horizontal"]],
		"LAJUJ": [["Lajuj","Lajuj significa 10 en el idioma Maya K'ich?? y est?? representado por dos lineas horizontales"]],
		"JULAJUJ": [["Julajuj","Julajuj significa 11 en el idioma Maya K'ich?? y est?? representado por dos lineas horizontales y un punto"]],
		"KABLAJUJ": [["Kab???lajuj","Kab???lajuj significa 12 en el idioma Maya K'ich?? y est?? representado por dos lineas horizontales y dos puntos"]],
		"OXLAJUJ": [["Oxlajuj","Oxlajuj significa 13 en el idioma Maya K'ich?? y est?? representado por dos lineas horizontales y tres puntos"]],
		"KAJLAJUJ": [["Kajlajuj","Kajlajuj significa 14 en el idioma Maya K'ich?? y est?? representado por dos lineas horizontales y cuatro puntos"]],
		"JOLAJUJ": [["Jolajuj","Jolajuj significa 15 en el idioma Maya K'ich?? y est?? representado por tres lineas horizontales"]],
		"WAQLAJUJ": [["Waqlajuj","Waqlajuj significa 16 en el idioma Maya K'ich?? y est?? representado por tres lineas horizontales y un punto"]],
		"WAJXAQLAJUJ": [["Wajxaqlajuj","Wajxaqlajuj significa 18 en el idioma Maya K'ich?? y est?? representado por tres lineas horizontales y tres puntos"]],
		"BELEJLAJUJ": [["Belejlajuj","Belejlajuj significa 19 en el idioma Maya K'ich?? y est?? representado por tres lineas horizontales y cuatro puntos"]],
		"JUKALJUWINAQ": [["Juk???al /juwinaq","Juk???al /juwinaq significa 20 en el idioma Maya K'ich?? y est?? representado por una concha y un punto"]],
		"CHOLQIJ": [["Cholq'ij","El Cholq??ij o calendario sagrado maya c"]],
		"MAYA": [["Maya","La cultura Maya destac?? a lo largo de m??s de dos milenios en numerosos aspectos socioculturales como su escritura, uno de los pocos sistemas de escritura plenamente desarrollados del continente americano precolombino, su arte, la arquitectura, su mitolog??a y sus notables sistemas de numeraci??n, as?? como en astronom??a y matem??ticas."]],
		"AJQIJ": [["Ajq'ij","Es importante anotar que quien conoce y ejercita cotidianamente el Cholq??ij o calendario sagrado maya, es la o el AJQ??IJ. En idioma k??iche??, la etimolog??a de este t??rmino es: AJ prefijo de un oficio. Q??IJ el sol-d??a. Puede traducirse como ?? el contador de los d??as ??. elplural de Ajq??ij es: AJQ??IJAB?? conocidos como sacerdotes mayas o gu??as espirituales."]],
		"NAWAL": [["Nawal","Nawal es la energ??a, esp??ritu o fuerza de los seres y elementos de la naturaleza, los nawales son representados por elementos mismos de la naturaleza como el sol, la luna, la lluvia, el aire, el agua, las plantas y animales porque en el pensamiento maya todo tiene vida."]],
		"LUNACIONES": [["Lunaciones","Dicen las abuelas y abuelos mayas: ??el Cholq??ij dura el tiempo que la luna tarda en darle nueve vueltas a la tierra??. cada vuelta que la luna da a la tierra es una lunaci??n y 9 lunaciones son un total de 260 d??as Este tiempo tambi??n es el necesario para el desarrollo de la vida humana desde el engendramiento hasta el alumbramiento o nacimiento, es decir, las nueve lunaciones que dura un ser dentro del vientre materno."]],
		"ANCESTROS": [["Ancestros","Individuo del que desciende otro, especialmente si vivi?? en una ??poca pasada muy remota. Los sistemas ancestrales son actividades o tradiciones que est??n vinculadas a la organizaci??n familiar y social. Es un conjunto de normas y procedimientos que han sido creados por los antepasados."]],
		"CALENDARIO": [["Calendario","El calendario sagrado Maya tambi??n conocido como Cholq'ij o calendario lunar comprende un total de veinte nawales los cuales tienen una aglutinaci??n de caracter??sticas no solo de personas sino tambi??n de caracter??sticas del d??a, relaciones sociales, cuestiones de salud, entre otras tantas situaciones m??s; es decir que conforme al pensamiento y estudios de los antiguos miembros de la civilizaci??n maya; cada d??a cuenta con caracter??sticas particulares por lo que hay d??as propicios para realizar tales o cuales acciones; adem??s cada uno de esos veinte nawales tiene trece niveles de energ??a que van desde uno hasta trece y que aumentan la potencia de las caracter??sticas de ese nawal en particular; la cuenta empieza en el nawal denominado Bat??z con el n??mero uno se lee en idioma k??ich?? Jun Batz, y termina en el d??a en el nawal Tz??i?? en la energ??a trece trece se lee en idioma k??ich?? oxlajuj Tz??i??"]],
		"COSMOLOGIA": [["Cosmolog??a","La Cosmolog??a es la rama del conocimiento que estudia el universo en conjunto. en el Popol Vuh encontramos raz??n de la creaci??n \"Entonces vinieron juntos Tepeu y Gugumatz; entonces conferenciaron sobre la vida y la claridad, c??mo se har?? para que aclare y amanezca, qui??n ser?? el que produzca el alimento y el sustento. -??H??gase as??! ??Que se llene el vac??o! ??Que esta agua se retire y desocupe el espacio, que surja la tierra y que se afirme! As?? dijeron. ??Que aclare, que amanezca en el cielo y en la tierra! No habr?? gloria ni grandeza en nuestra creaci??n y formaci??n hasta que exista la criatura humana, el hombre formado. As?? dijeron. Luego la tierra fue creada por ellos. As?? fue en verdad como se hizo la creaci??n de la tierra: - ??Tierra!, dijeron, y al instante fue hecha. Como la neblina, como la nube y como una polvareda fue la creaci??n, cuando surgieron del agua las	monta??as; y al instante crecieron las monta??as. Solamente por un prodigio, s??lo por arte m??gica se realiz?? la formaci??n de las monta??as y los valles; al instante brotaron juntos los cipresales y pinares en la superficie. Y as?? se llen?? de alegr??a Gugumatz, diciendo: -??Buena ha sido tu venida, Coraz??n del Cielo; t??, Hurac??n, y t??, Ch??pi-Caculh??, Raxa-Caculh??! -Nuestra obra, nuestra creaci??n ser?? terminada, contestaron.\""]],
		"ASTROS": [["Astros","Los astros son cuerpos celestes que tienen una forma definida. Hay una gran variedad de ellos y algunos ejemplos son: los planetas, las estrellas, el sol, los sat??lites y otros"]],
		"SOLAR": [["Solar","El calendario solar Maya, tambi??n llamado Haab est?? compuesto por 18 meses de 20 d??as cada uno, m??s un mes que consta de 5 d??as.  Cada mes de 20 d??as, conocido como uinal, tiene su propio nombre. Todos estos 18 meses juntos suman 360 d??as. El ??ltimo mes, compuesto de 5 d??as, se conoce como Wayeb. Los 19 meses en su totalidad suman 365 d??as. "]],
		"LUNAR": [["Lunar","El calendario Lunar Maya, tambi??n llamado Cholq'ij o Tzolkin tiene 260 d??as, es uno de los instrumentos que los abuelos del Pueblo maya crearon; tiene dos aplicaciones principales, la primera: ubicar momentos para actividades colectivas; la segunda: tiene una aplicaci??n individual para identificar la conducta natural o la forma de ser de las personas por medio de su nawal, es decir, los rasgos psicol??gicos b??sicos, positivos y negativos"]],
		"HAAB": [["Haab","El calendario solar Maya, tambi??n llamado Haab est?? compuesto por 18 meses de 20 d??as cada uno, m??s un mes que consta de 5 d??as.  Cada mes de 20 d??as, conocido como uinal, tiene su propio nombre. Todos estos 18 meses juntos suman 360 d??as. El ??ltimo mes, compuesto de 5 d??as, se conoce como Wayeb. Los 19 meses en su totalidad suman 365 d??as. "]],
		"CARGADOR": [["Cargador","Cada a??o se rige por cuatro ??nicos cargadores, E, Iq???, Kej y Noj. Estos ciclos tienen un significado particular dentro del pensamiento ancestral Maya."]],
		"UINAL": [["Uinal","Las unidades b??sicas de medida del tiempo en el calendario maya eran: Kin: equivalente a un d??a terrestre. Uinal: 20 kines. Es una unidad equivalente a un mes de 20 d??as terrestres."]],
		"AJQIJAB": [["Ajq'ijab","El plural de Ajq??ij es: AJQ??IJAB?? conocidos como sacerdotes mayas o gu??as espirituales. Son personas, mujeres y hombres que ejercitan la virtud de contar el tiempo y orientar a la poblaci??n. Su palabra, sentimiento, intuici??n, conocimiento, experiencia y sabidur??a ha sido cultivada en la tradici??n oral con sencillez humana, su autoridad es ??nicamente moral y descansa en el reconocimiento y aceptaci??n de la sociedad."]],
		"ENERGIAS": [["Energ??as","Cada d??a tiene distinta carga energ??tica con respecto a las 13 posibles. El n??mero da una potencia que combinada con el d??a maya o nawal crea una energ??a determinada. desde 1 bat'z, 2 bat'z, 3 bat'z... pasando por cada nawal hasya llegar a 11 tz'i', 12 tz'i', y 13 tz'i'."]],
		"ASTRONOMIA": [["Astronomia","Los mayas, hicieron c??lculos exactos, de los periodos sin??dicos de Mercurio, Venus, Marte, J??piter y Saturno. Calcularon con exactitud, los per??odos de la Luna , el Sol y de estrellas como las Pl??yades, a las que llamaban Tzab-ek (estrella cascabel) y marcaba los inicios de festividades rituales. El Tzol'kin de 260 d??as es uno de los calendarios m??s enigm??ticos en cuanto su origen, algunos postulan que se basa en una aproximaci??n a la gestaci??n humana."]],
		"SACERDOTEMAYA": [["Sacerdote Maya","Un Sacerdote Maya o Ajq'ij es quien conoce y ejercita cotidianamente el Cholq??ij o calendario sagrado maya, es la o el AJQ??IJ. En idioma k??iche??, la etimolog??a de este t??rmino es: AJ prefijo de un oficio. Q??IJ el sol-d??a. Puede traducirse como ?? el contador de los d??as ??. elplural de Ajq??ij es: AJQ??IJAB?? conocidos como sacerdotes mayas o gu??as espirituales."]],
		"CODICEDEMADRID": [["C??dice de Madrid","En este C??dice, se pueden identificar claramente en el recuadro interior los ideogramas o glifos de los 20 nawales, adem??s, se identifica lo que la tradici??n oral llama: las cuatro esquinas del universo y los cuatro rincones del mundo ???lo exterior y lo interior-. Por otra parte, cada uno de los puntos que forman la cadena que circula o bordea el C??dice, representa cada uno de los d??as que suman 260"]],
		"GLIFO": [["Glifo","Es un signo grabado o, por extensi??n, escrito o pintado. en la imagen de referencia tenemos Xikitin/Cigarra Un poema tseltal en glifos mayas https://www.jornada.com.mx/2016/02/13/oja-cigarra.html "]],

		
		
		
	};
	
// 	var searchTypesArray = Object.keys(definitions);
// 	var defi = Object.values(searchTypesArray);
// 		var nombrePalabra = searchTypesArray[0];
// 		var definicion = defi[0];
// 		var nombrePalabra1 = searchTypesArray[1];
		
// 		var definicion1 = definitions[searchTypesArray[1]];
// console.log(searchTypesArray);
// console.log(definitions);
// console.log(searchTypesArray)
// console.log(nombrePalabra);
// console.log(definicion);
// console.log(nombrePalabra1);
// console.log(definicion1[0][0]);

// alert();



	var searchTypesArray = Object.keys(definitions); //converts theme object to array
	//generates random number/index

	for (var i = 0; i < searchTypesArray.length; i++) {

		var nombrePalabra = searchTypesArray[i];
		var definicion = definitions[searchTypesArray[i]];
		if (palabra == nombrePalabra) {
			// alert(palabra +" "+ nombrePalabra);
			if(palabra == "NAWALES"){
				$("#info").text("Encontraste " + "NAWALES");
				$("#def").text(definicion[0][1]);
				break;
			}else{
				$("#info").text("Encontraste " + definicion[0][0]);
				$("#def").text(definicion[0][1]);
				break;
			}
			

		}

	}

}