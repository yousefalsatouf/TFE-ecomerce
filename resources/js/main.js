let images = document.querySelector('.images');

images.addEventListener('mouseover', changeDefOver);
images.addEventListener('mouseout', changeDefOut);

function changeDefOver(e) {
    e.target.classList.toggle('opacity-toggle');
    //console.log('over')
}
function changeDefOut(e) {
    e.target.classList.toggle('opacity-toggle');
    //console.log('out')
}
