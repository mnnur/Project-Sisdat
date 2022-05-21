const $ = function (id) {
    return document.getElementById(id);
}


let list = document.querySelectorAll('#sidenav a');


for(let item of list ){
    item.addEventListener('click', function(){
        //onclick add active, if there is active remove it
        let active = document.querySelector('.active');
        if(active){
            active.classList.remove('active');
        }
        this.classList.add('active');
        
    });
}

function displayAddFormPopup(){
    if($('addFormPopup').style.display == 'block'){
        $('addFormPopup').style.display = 'none';
    }else{
        $('addFormPopup').style.display = 'block';
    }
}

function closeAddFormPopup(){
    $('addFormPopup').style.display = 'none';
}

function displayEditFormPopup(){
    if($('editFormPopup').style.display == 'block'){
        $('editFormPopup').style.display = 'none';
    }
    else{
        $('editFormPopup').style.display = 'block';
    }
}

function closeEditFormPopup(){
    $('editFormPopup').style.display = 'none';
}
