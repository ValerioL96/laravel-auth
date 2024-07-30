const deleteForms = document.querySelectorAll('form.delete-form');

deleteForms.forEach((deleteFormEl) =>{
    deleteFormEl.addEventListener('submit', function( event ){
        event.preventDefault();
        if(window.confirm('Are you sure you want to delete' + ' ' + this.getAttribute('data_project_name') + ' '+ '?' ) === true){
            this.submit();
        }
    });

})
