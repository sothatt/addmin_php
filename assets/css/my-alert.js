function myAlert(type, sms){
    Swal.fire({
        position: "top-end",
        icon: type,
        title: sms,
        showConfirmButton: false,
        timer: 2500
      });

    if (type == "error"){
        var sound = new Audio('mp3/error.mp3');
        sound.play();
    }else{
        var sound = new Audio('mp3/success.mp3');
        sound.play();
    }
}