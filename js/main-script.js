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