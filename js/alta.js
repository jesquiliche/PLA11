


const alta=async ()=>{
   
    const nif = document.querySelector('#nif').value
    const nombre = document.querySelector('#nombre').value 
    const apellidos = document.querySelector('#apellidos').value
    const fechaingreso = document.querySelector('#apellidos').value
    const error=document.querySelector('#errores')

    const datos=new FormData();
    datos.append('nif',nif)
    datos.append('nombre',nombre)
    datos.append('apellidos',apellidos)
    datos.append('fechaingreso',fechaingreso)
    
    const url = './servicios/servAlta.php'

    let param = {
        method: 'POST', //métode d'enviament
        body: datos     //dades a enviar al servidor
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

        switch(mensaje.codigo){
            case '00':
                error.innerHTML="Paciente dado de alta";
                break;
            case '10':
                error.innerHTML="El paciente ya existe en la BB.DD";
                break;
            case '11':
                error.innerHTML="";
                for(x of mensaje.errors){
                    error.innerHTML+=`<div>${x}</div>`
                }
             break;

        }
       
    })
    .catch(function(error) {
        
        alert(error)
    })
}
   

const btn=document.getElementById("alta").addEventListener("click",alta)