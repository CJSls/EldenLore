
const videoBoxes = document.querySelectorAll('.video-box, .video-box1, .video-box2');


function handleScroll() {
    const headerHeight = document.querySelector('.header').offsetHeight;

    videoBoxes.forEach(box => {
        
        const boxTop = box.getBoundingClientRect().top;
        const boxBottom = box.getBoundingClientRect().bottom;
        

        const translateYValue = Math.max(0, (window.innerHeight - boxTop - headerHeight) * 0.3); 
        
        box.style.transform = `translateY(-${translateYValue}px)`; 
        
       
        const middleOfPage = window.innerHeight / 2; 
        
        if (boxTop < middleOfPage && boxBottom > middleOfPage) {
            box.style.opacity = 1;
        } else if (boxTop < window.innerHeight *2) {
            box.style.opacity = 1 - boxTop / (window.innerHeight *2); 
        } else {
            box.style.opacity = 1; 
        }
    });
}


window.addEventListener('scroll', handleScroll);


handleScroll();