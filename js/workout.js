

/*
2. Smart Form: Weekly Workout Schedule
Create a web page with smart form in it to be used with weekly workout schedule. 
Form should have inputs arranged as a table rows and columns. 
Each column is reserved for one day and each row describes one activity (
for example: gym, running, swimming, aerobics etc.) 
The user can enter the amount of hours spent on each exercise daily.

DONE

Then add some functionality in the form: last column should sum the entered 
values for each activity. Also a total sum of all activity should be calculated.

DONE

Every field needs to be checked against empty and erroneous content. 
Should an error occur, a smart indication should become visible showing 
the place of an error and a small hint text to guide the user.
Try to utilize fields, checkboxes and pulldowns. Style with CSS. 
Also think of a way to apply the ability to hide/show HTML element when necessary.
*/


// laita kaikki inputit array:n

// var taulukkoKentat[] = document.getElementByTagName('input');

function laske1() {
	// etsitään kaikki maanantaille syötetyt luvut ja tehdään siitä array
		var arr = document.getElementsByClassName('eka');
		// alustetaan muuttuja yht (yhteensä)
		var yht = 0;
		
		// haetaan for-loopilla arrayn pituus ja haetaan arrayn arvot
		for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'yht' 'ma'-nimiseen HTML-elementtiin
		document.getElementById('ma').innerHTML = yht;
		}


function laske2() {
	// etsitään kaikki maanantaille syötetyt luvut ja tehdään siitä array
		var arr = document.getElementsByClassName('toka');
		// alustetaan muuttuja yht (yhteensä)
		var yht = 0;
		
		// haetaan for-loopilla arrayn pituus ja haetaan arrayn arvot
		for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'yht' 'ma'-nimiseen HTML-elementtiin
		document.getElementById('ti').innerHTML = yht;
		}

function laske3() {
	// etsitään kaikki maanantaille syötetyt luvut ja tehdään siitä array
		var arr = document.getElementsByClassName('kolmas');
		// alustetaan muuttuja yht (yhteensä)
		var yht = 0;
		
		// haetaan for-loopilla arrayn pituus ja haetaan arrayn arvot
		for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'yht' 'ma'-nimiseen HTML-elementtiin
		document.getElementById('ke').innerHTML = yht;
		}		
		
function laske4() {
	// etsitään kaikki maanantaille syötetyt luvut ja tehdään siitä array
		var arr = document.getElementsByClassName('neljas');
		// alustetaan muuttuja yht (yhteensä)
		var yht = 0;
		
		// haetaan for-loopilla arrayn pituus ja haetaan arrayn arvot
		for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'yht' 'ma'-nimiseen HTML-elementtiin
		document.getElementById('to').innerHTML = yht;
		}		

		
function laske5() {
	// etsitään kaikki maanantaille syötetyt luvut ja tehdään siitä array
		var arr = document.getElementsByClassName('viides');
		// alustetaan muuttuja yht (yhteensä)
		var yht = 0;
		
		// haetaan for-loopilla arrayn pituus ja haetaan arrayn arvot
		for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'yht' 'ma'-nimiseen HTML-elementtiin
		document.getElementById('pe').innerHTML = yht;
		}		
		
function laske6() {
	// etsitään kaikki maanantaille syötetyt luvut ja tehdään siitä array
		var arr = document.getElementsByClassName('kuudes');
		// alustetaan muuttuja yht (yhteensä)
		var yht = 0;
		
		// haetaan for-loopilla arrayn pituus ja haetaan arrayn arvot
		for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'yht' 'ma'-nimiseen HTML-elementtiin
		document.getElementById('la').innerHTML = yht;
		}	

function laske7() {
	// etsitään kaikki maanantaille syötetyt luvut ja tehdään siitä array
		var arr = document.getElementsByClassName('seitsemas');
		// alustetaan muuttuja yht (yhteensä)
		var yht = 0;
		
		// haetaan for-loopilla arrayn pituus ja haetaan arrayn arvot
		for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'yht' 'ma'-nimiseen HTML-elementtiin
		document.getElementById('su').innerHTML = yht;
		}	

// lasketaan yhteen kaikkien päivien liikuntamäärät:

function liikunnatYht() {
	
	// etsitään kaikki taulukon luvut input-tagin avulla
	var arr = document.getElementsByTagName('input');
	var yht = 0;
	
	for (var i=0; i<arr.length; i++){
			if(parseInt(arr[i].value))
				yht += parseInt(arr[i].value);
			
		}
		// sijoitetaan muuttuja 'kokonaisuus' ''
	document.getElementById('kokonaisuus').innerHTML = yht;
	
}

function tarkista() {

if (document.getElementById('enimi').value=="") {
alert('Syötä etunimesi.')
document.getElementById('enimi').style.borderColor = "red";
return false;
}


}