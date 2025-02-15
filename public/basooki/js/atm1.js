
function paralaxToLeft() {
	const paralaxs = document.querySelectorAll('.paralax.paralaxtoleft');
	const scrollPosition = window.scrollY;

	paralaxs.forEach(paralax => {
		// Gambar bergeser ke kanan seiring scroll
		paralax.style.transform = `translateX(-${scrollPosition * 0.5}px)`;
	});
}
function paralaxToRight() {
	const paralaxs = document.querySelectorAll('.paralax.paralaxtoright');
	const scrollPosition = window.scrollY;

	paralaxs.forEach(paralax => {
		// Gambar bergeser ke kanan seiring scroll
		paralax.style.transform = `translateX(${scrollPosition * 0.5}px)`;
	});
}
window.addEventListener('scroll', function () {
	paralaxToLeft();
	paralaxToRight();
});

const backgrounds = document.querySelectorAll(".bg-circle-random");

function getRandomColor(dark) {
	let hex = Math.floor(Math.random() * 16777215).toString(16); // Warna acak dalam HEX
	if(!dark){}else{
		hex = Math.floor(Math.random() * 167772).toString(16); // Warna acak dalam HEX
	}
    return `#${hex.padStart(6, "0")}ee`;
}
// Fungsi untuk menggerakkan lingkaran secara acak
function moveCircle(circle) {
	let newX = parseInt(Math.random() * document.body.clientWidth);
	newX = (newX > screen.width)? 0 : newX;
	let newY = parseInt(Math.random() * document.body.clientHeight);
	newY = (newY > screen.height)? 0 : newY;

    // Ukuran dan posisi awal acak
    let size = parseInt(Math.random() * document.body.clientWidth / 3); // Min size 20px
    let x = parseInt(Math.random() * document.body.clientWidth);
    let y = parseInt(Math.random() * document.body.clientHeight);


	// Update posisi lingkaran
    circle.style.width = `${size}px`;
    circle.style.height = `${size}px`;
	circle.style.left = `${newX}px`;
	circle.style.top = `${newY}px`;
    circle.style.background = getRandomColor();
}
// Membuat lingkaran secara acak
//for (let i = 0; i < Math.random() * 10; i++) {
for (let i = 0; i < 2; i++) {
    const circle = document.createElement("div");
    circle.className = "circle";

    // Ukuran dan posisi awal acak
    let size = parseInt(Math.random() * document.body.clientWidth / 10) + 20; // Min size 20px
    let x = parseInt(Math.random() * document.body.clientWidth);
    let y = parseInt(Math.random() * document.body.clientHeight);

    circle.style.width = `${size}px`;
    circle.style.height = `${size}px`;
    circle.style.left = `${x}px`;
    circle.style.top = `${y}px`;
    circle.style.zIndex = `-1`;
    //circle.style.position = "absolute";
    //circle.style.borderRadius = "50%";
    //circle.style.background = "rgba(100, 100, 255, 0.5)"; // Warna lingkaran
    circle.style.background = getRandomColor();
    circle.style.transition = "all 5s linear"; // Transisi smooth

    // Tambahkan lingkaran ke elemen dengan kelas "bg-circle-random"
    backgrounds.forEach((background) => {
        background.appendChild(circle);
		// Interval untuk pergerakan lingkaran
		setInterval(function(){
			moveCircle(circle);
		}, 5000); // Pindah setiap 3 detik
    });


}


setInterval(function(){
	let body = document.querySelector('body');

	body.style.backgroundColor = getRandomColor(true);
	body.style.transition = "all 10s linear"; // Transisi smooth
},5000);