


const bajaPaciente=async ()=>{
    let mensaje=""
    const idpaciente=document.getElementById('idpaciente').value
    const error=document.querySelector('#errores')
   
    const datos=new FormData()
    datos.append('idpaciente',idpaciente)
    
    const url = './servicios/servBaja.php'

    let param = {
        method: 'POST', 
        body: datos    
    }

    await fetch(url, param)
    
    .then(await function(resp) {
        
        if (resp.ok) {
            //resposta correcta: missatge de tipus text
            
            return resp.json(); //o text() o blob()
        } else {
            //resposta amb error

            throw("La petición no se ha podido realizar")
        }
    })
    //recoger el mensaje del servidor para informar el pais
    .then(mensaje=> {
        error.innerHTML="";
        console.log(mensaje)
        switch(mensaje.codigo){
            case '00':
                error.innerHTML="Baja efectuada";
                break;
            case '10':
                error.innerHTML="El paciente no ha sido dado de baja";
                break;
            case '11':
                error.innerHTML="";
                for(x of mensaje.errors){
                    error.innerHTML+=`<div>${x}</div>`
                }
                break;
        }
       
    })
    .catch(function(e) {
        
        alert(e)
    })
   
    
      
}

document.getElementById('baja').onclick=bajaPaciente

