


const alta=async ()=>{
   
    const nif = document.querySelector('#nif').value
    const nombre = document.querySelector('#nombre').value 
    const apellidos = document.querySelector('#apellidos').value
    const fechaingreso = document.querySelector('#apellidos').value
    const error=document.querySelector('#errores')



    //console.log(formulario)
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

    //fer la petició ajax
    await fetch(url, param)
    //recollir la resposta del servidor
    .then(await function(resp) {
        
        if (resp.ok) {
            //resposta correcta: missatge de tipus text
        
            return resp.json(); //o text() o blob()
        } else {
            //resposta amb error
            console.log(resp.text)
            throw("La petició no ha s'ha pogut realitzar")
        }
    })
    //recoger el mensaje del servidor para informar el pais
    .then(mensaje=> {
        console.log(mensaje)
        if (mensaje.codigo == '00') {
            alert(mensaje)
        
        } else if (mensaje.codigo==11) {
            alert(mensaje.codigo);
            error.innerHTML="";
            for(x of mensaje.errors){
                error.innerHTML+=`<div>${x}</div>`

            }
        } else{}
    })
    .catch(function(error) {
        
        alert(error)
    })
}
   

const btn=document.getElementById("alta").addEventListener("click",alta)