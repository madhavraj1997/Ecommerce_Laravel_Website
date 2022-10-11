const lens = document.querySelector('.magnifier-lens');
const product_img = document.querySelector('.imgs img');
const product_imgs = document.querySelector('.magnified-img');


function magnify(product_img,product_imgs) {
    lens.addEventListener('mousemove', moveLens)
    product_img.addEventListener('mousemove', moveLens)

    lens.addEventListener('mouseout', leaveLens)
}

function moveLens(e) {
    // console.log("X : " + e.pageX + "Y :" + e.pageY);
    let x,y,cx,cy;
    // Get the position of the cursor
    const product_img_rect = product_img.getBoundingClientRect();
    x = e.pageX - product_img_rect.left - lens.offsetWidth / 2;
    y=e.pageY - product_img_rect.top - lens.offsetHeight / 2;

    

    let max_xpos = product_img_rect.width - lens.offsetWidth;
    let max_ypos = product_img_rect.height - lens.offsetHeight;

    if(x > max_xpos) x = max_xpos;
    if(x < 0) x= 0;
    
    if(y > max_ypos) y = max_ypos;
    if(y < 0) y= 0;

    lens.style.cssText = `top: ${y}px; left: ${x}px`;

    cx = product_imgs.offsetWidth / lens.offsetWidth;
    cy = product_imgs.offsetHeight / lens.offsetHeight;

    product_imgs.style.cssText = `
                    background: url('${product_img.src}')
                    -${x * cx}px -${y * cy}px /
                    ${product_img_rect.width * cx}px ${product_img_rect.height * cy}px
                    no-repeat


    `;

    lens.classList.add('active');
    product_imgs.classList.add('active');

}

function leaveLens(){
    lens.classList.remove('active');
    product_imgs.classList.remove('active');

}

magnify(product_img,product_imgs);

