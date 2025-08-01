function hideShow(){
    var vis_text = document.getElementsByClassName('vis_text') [0];
    var hid_text = document.getElementsByClassName('hid_text') [0];
    var btn_text = document.getElementById('hideShow_btn');

    if(hid_text.style.display == 'inline'){
        hid_text.style.display = 'none';
        btn_text.innerHTML = 'Read More'; 
        vis_text.classList.remove('expanded') ;
        
    }else{
        hid_text.style.display = 'inline';
        btn_text.innerHTML = 'Read Less';
        vis_text.classList.add('expanded') ;
       
    }
}