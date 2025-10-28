function myAlert(type,sms){
    Swal.fire({
    icon: type,
    title: sms,
    showConfirmButton: false,
    timer: 2500
    }); 
}