async function verificaErro(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    })
    
      
    await Toast.fire({
        icon: 'error',
        title: 'Você não pode deletar você mesmo!'
    })
}

function verificaSucesso(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    })
    
      
     Toast.fire({
        icon: 'success',
        title: 'Usuário alterado com sucesso!'
    })
}




  
 