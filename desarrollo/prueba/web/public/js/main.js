function confirmDelete(locationUrl, messageAlert){			

	bootbox.confirm(messageAlert, function(result){				
			if(result == true){
				window.location.href = locationUrl;
			}
	});
}

if (document.getElementById('deleteBtn')) {
	var deleteBtn = document.getElementById('deleteBtn');
	var message = deleteBtn.getAttribute('data-message');

	deleteBtn.addEventListener('click', function(e) {
	 	e.preventDefault();
	  	confirmDelete(this.getAttribute("href"), message);
	});
}	


$(function(){

	if (document.getElementById('alertMessage')){
		setTimeout(function() {		 
			divMessage = document.getElementById('alertMessage');
			  setTimeout(function() {
			      var divParentMessage = divMessage.parentNode;
			      divParentMessage.removeChild(divMessage);
			  }, 500 );
			}, 3500);
	}
		
});
