function enviarCorreo() {

    $.post("../../controller/email.php?op=enviarCorreo", function (data) {
        console.log(data);
    });

    let timerInterval
    Swal.fire({
      title: 'Enviando correos...!',
      html: 'Esta ventana se cerrará en <b></b> segundo...',
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft()
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
      }
    })
}