const notificationsShowwTime = 7500;


$("#btnSaveEvent").click(()=> { 
   
    let eventTitle = $("#eventTitle").val().trim();
  
    let eventTime = $("#eventTime").val().trim();
    let eventDate = $("#eventDate").val().trim();
   
    let file             = _("eventImage").files[0];
    let eventDescription = CKEDITOR.instances['eventDescription'].getData();
    
    if (eventTitle == '' ) { 
        showErrorMessage("Event Title can't be empty", 0);
        return;
    }
    if (eventTime == '' ) { 
        showErrorMessage("Event Time can't be empty", 0);
        return;
    }
    if (eventDate == '' ) { 
        showErrorMessage("Event Date can't be empty", 0);
        return;
    }
    if (eventDescription == '' ) { 
        showErrorMessage("Event Description can't be empty", 0);
        return;
    }
    if (file == '' || file == null ) { 
        showErrorMessage("Event Image can't be empty", 0);
        return;
    }
    loadingScreen(true , "");
    
    let formdata = new FormData();
	formdata.append("file_", file);
	formdata.append("eventTitle", eventTitle);
	formdata.append("eventTime", eventTime);
    formdata.append("eventDate", eventDate);
    formdata.append("eventDescription", eventDescription);
	let ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlerLectureFileUpload, false);
	ajax.addEventListener("load", completeHandlerLectureFileUpload, false);
	ajax.addEventListener("error", errorHandlerLectureFileUpload, false);
	ajax.addEventListener("abort", abortHandlerLectureFileUpload, false);
	ajax.open("POST", "slave.php");
	ajax.send(formdata);
  
  
});






























/*********************************************************************************************/
$("#btnSendEvent").click(() => { 
    let id = $("#eveId").val();
    if (id == 'null') { 
        showErrorMessage("Please Select Post", 0);
        return;
    }
     loadingScreen(true , "");
    $.post("slave.php", {
        id: id
    }, response => { 
        loadingScreen(false, "");
        alert(response)
        let res = JSON.parse(response);
       
        alert(res.success + '---'+ res.failure);
        }
    );
});

/*********************************************************************************************/






/*********************************************************************************************/

/*********************************************************************************************/


/*********************************************************************************************/
/*********************************************************************************************/

/*********************************************************************************************/


/*********************************************************************************************/


/*********************************************************************************************/




/*********************************************************************************************/


/*********************************************************************************************/




function loadingScreen(sho, message) {
	if (sho) {
		$.blockUI({
			message: message == '' ? "<h3> Processing.Please Wait...</h3>": "<h3> " + message + "</h3>",
			css    : {
				border                 : 'none',
				padding                : '15px',
				backgroundColor        : '#000',
				'-webkit-border-radius': '10px',
				'-moz-border-radius'   : '10px',
				opacity                : .5,
				color                  : '#fff'
			}
		});
	} else {
		$.unblockUI({
			fadeOut: 100
		});
	}
}

/*********************************************************************************************/
function completeHandlerLectureFileUpload(event){
        loadingScreen(false , "");

        
          if(event.target.responseText=="Complete"){
		BootstrapDialog.alert({
			title      : 'Event Saved ',
			message    : "Successfully saved .",
			type       : BootstrapDialog.TYPE_SUCCESS,
			closable   : true,
			draggable  : true,
			buttonLabel: 'Ok'
		});

		CKEDITOR.instances['eventDescription'].updateElement();
              CKEDITOR.instances['eventDescription'].setData('');
              $("#eventTitle").val("");  
     $("#eventTime").val("");
     $("#eventDate").val("");

			/* if($("#uploadedCheckBoxResetForm").is(':checked')){
	       		$('#fomFileUpload')[0].reset();
	    	} */
            }else{
            	if(event.target.responseText == "exists"){
		BootstrapDialog.alert({
			title      : 'Event  Duplication',
			message    : "Event Already saved.",
			type       : BootstrapDialog.TYPE_WARNING,
			closable   : true,
			draggable  : true,
			buttonLabel: 'Ok'
		});
            	}else{
		BootstrapDialog.alert({
			title      : 'Event not Saved ',
			message    : "upload failed.tr again! ",
			type       : BootstrapDialog.TYPE_DANGER,
			closable   : true,
			draggable  : true,
			buttonLabel: 'Ok'
		});
            	}
            	
            }

         
}
/*********************************************************************************************/

function errorHandlerLectureFileUpload(event){
    loadingScreen(false , "");
	BootstrapDialog.alert({
		title      : 'Event not Saved ',
		message    : "An error Ocured.Please try again.",
		type       : BootstrapDialog.TYPE_DANGER,
		closable   : true,
		draggable  : true,
		buttonLabel: 'Ok'
	});
   
}
/*********************************************************************************************/
/*********************************************************************************************/

function errorHandlerStudentFileUpload(event){
    loadingScreen(false , "");
	BootstrapDialog.alert({
		title      : 'Event not Saved ',
		message    : "An error Ocured.Please try again.",
		type       : BootstrapDialog.TYPE_DANGER,
		closable   : true,
		draggable  : true,
		buttonLabel: 'Ok'
	});
   
}
/*********************************************************************************************/
function abortHandlerStudentFileUpload(event){
 BootstrapDialog.alert({
		title      : 'Event not Saved ',
		message    : "An cancellation has ocured.Please try again to upload.",
		type       : BootstrapDialog.TYPE_WARNING,
		closable   : true,
		draggable  : true,
		buttonLabel: 'Ok'
	});
 
}


/*********************************************************************************************/

function abortHandlerLectureFileUpload(event){
 BootstrapDialog.alert({
		title      : 'Event not Saved ',
		message    : "An cancellation has ocured.Please try again to upload.",
		type       : BootstrapDialog.TYPE_WARNING,
		closable   : true,
		draggable  : true,
		buttonLabel: 'Ok'
	});
 
}
/*********************************************************************************************/


function progressHandlerLectureFileUpload(event){

}

/*********************************************************************************************/


function showDialog() {
  loadingScreen(true , "");
}



/***************************************************/

function hideDialog() {
  loadingScreen(false , "");
}

/***********************************************************************************************/

/**This will validate email and return a boolean value*/
function ValidateEmail(inputText) {
	let mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (inputText.match(mailFormat)) {
		return true;
	} else {
		return false;
	}
}

/**to escape html elements to avoid injections*/
let tagsToReplace = {
	'&': '&amp;',
	'<': '&lt;',
	'>': '&gt;'
};
/***********************************************************************************************/
function __replaceTag(tag) {
	return tagsToReplace[tag] || tag;
}
/***********************************************************************************************/
function safe_tags_replace(str) {
	return str.replace(/[&<>]/g, __replaceTag);
}
/* ********************************************************************************************* */
function _(el){
	return document.getElementById(el);
}
/* ********************************************************************************************* */




/*********************************************************************************************/


function showGeneralMessage(message, time) {
	$.toast({
		heading  : '',
		text     : message == '' ? "Hi."             : message,
		hideAfter: time == 0 ? notificationsShowwTime: time,
		position : 'mid-center',
		stack    : false
	});
}
/*********************************************************************************************/
function showSuccessMessage(message, time) {
	$.toast({
		heading  : 'Success',
		text     : message == '' ? "Hi."             : message,
		hideAfter: time == 0 ? notificationsShowwTime: time,
		position : 'top-right',
		icon     : 'success'
	});
}

/*********************************************************************************************/

function showWarningMessage(message, time) {
	$.toast({
		heading  : 'Warning',
		text     : message == '' ? "Hi."             : message,
		hideAfter: time == 0 ? notificationsShowwTime: time,
		position : 'top-right',
		icon     : 'warning'
	});
}

/*********************************************************************************************/
function showErrorMessage(message, time) {
	$.toast({
		heading  : 'Error',
		text     : message == '' ? "Hi."             : message,
		hideAfter: time == 0 ? notificationsShowwTime: time,
		position : 'top-right',
		icon     : 'error'
	});
}


/*********************************************************************************************/
function showSimpleToast() {
	$.toast({
		heading           : 'Information',
		text              : 'Now you can add icons to generate different kinds of toasts',
		showHideTransition: 'slide',
		hideAfter         : notificationsShowwTime,
		position          : 'top-right',
		icon              : 'info'
	});
}



