document.getElementById('creation-form').addEventListener('submit', function( event ){

    event.preventDefault();


    if(window.confirm('Are you sure you want to edit?') === true){
        this.submit();
    }
})
