const images = [
    'images/Produkti 01.jpg',
    'images/Produkti 02.jpg',
    'images/Produkti 03.jpg',
    'images/Produkti 04.jpg',
    'images/Produkti 05.jpg',
    'images/Produkti 06.jpg',
    'images/Produkti 07.jpg',
    'images/Produkti 08.jpg',
    'images/Produkti 09.jpg',
    'images/Produkti 10.jpg',
];

const first = 0;
const last = images.length - 1;
let current = 0;

const nextBut = document.getElementById('next');

nextBut.addEventListener('click', () =>{
    const imgTag = document.getElementById('image');
    current++;
    if(current >= last){
        current = 9;
    }
    imgTag.src = images[current];
});

const prevBut = document.getElementById('previous');

prevBut.addEventListener('click', () =>{
    const imgTag = document.getElementById('image');
    current--;
    if(current <= first){
        current = 0;
    }
    imgTag.src = images[current];
});