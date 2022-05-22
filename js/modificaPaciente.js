
alert("entro")

const modificaPaciente=async ()=>{
    let mensaje=""
    const idpaciente=document.getElementById('idpaciente').value
   
    const nif=document.getElementById('nif').value
    const nombre=document.getElementById('nombre').value
    const apellidos=document.getElementById('apellidos').value
    const fechaingreso=document.getElementById('fechaingreso').value
    const error=document.querySelector('#errores')
    alert(error)
    

    if(idpaciente.length==0) {
        mensaje+="Debe seleccionar un paciente primero.\n"
    } 
 /*   if(nif.length==0) {
        mensaje+="El nif es requerido.\n"
    }*/ 
    if(nombre.length==0) {
        mensaje+="El nombre es requerido.\n"
    }
    if(apellidos.length==0) {
        mensaje+="Los apellidos son requeridos.\n"
    }
    if(fechaingreso.length==0) {
        mensaje+="La fecha ingreso es requerida.\n"
    }
    if(mensaje.length>0) alert(mensaje)

    const datos=new FormData()
    datos.append('idpaciente',idpaciente)
    datos.append('nif',nif)
    datos.append('nombre',nombre)
    datos.append('apellidos',apellidos)
    datos.append('fechaingreso',fechaingreso)
    
    const url = './servicios/servModificacion.php'

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
                error.innerHTML="Paciente dado de alta";
                break;
            case '10':
                error.innerHTML=mensaje.error;
                break;
            case '11':
             /*   error.innerHTML="";
                for(x of mensaje.errors){
                    error.innerHTML+=`<div>${x}</div>`
                }*/
             break;

        }
       
    })
    .catch(function(error) {
        
        alert(error)
    })
   
    
      
}

document.getElementById('modificacion').onclick=modificaPaciente