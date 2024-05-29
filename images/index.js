var canvas = document.getElementById('viewport'),
context = canvas.getContext('2d');

make_base();

function make_base()
{
    base_image = new Image();
    base_image.src = 'image_template.png';
    console.log(base_image.toDataURL());
    base_image.onload = function(){
        context.drawImage(base_image, 0, 0);
    }
}