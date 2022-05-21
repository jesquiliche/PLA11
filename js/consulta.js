const consulta=async (p=1)=>{
   
    const numpacientes=document.getElementById("cbopacientes").value;
    const pagina=1;
//    const pagina=document.getElementById("pagina").value;
    const buscar=document.getElementById("buscar").value;
    const tabla=document.getElementById("filas");
    const paginacion=document.getElementById("paginas");
    
    const url = './servicios/servConsulta.php'
    
    const datos=new FormData();
    datos.append('numpacientes',numpacientes)
    datos.append('pagina',pagina)
    datos.append('buscar',buscar)

    let param = {
        method: 'POST', 
        body: datos
    }
   
    const data=await fetch(url, param)
    
    const response=await data.json()
    console.log(response)
    const paginas=response.paginas

    tabla.innerHTML="";
    response.pacientes.forEach(e => {
        let fila = tabla.insertRow();
        fila.insertCell().innerHTML = e.nif;
        fila.insertCell().innerHTML = e.nombre;
        fila.insertCell().innerHTML = e.apellidos;
    });
    
    paginacion.innerHTML="<center>";
    for(let x=1;x<paginas+1;x++){
        paginacion.innerHTML+=`<a href='#' ${x}'><input type='button' id='pagina' value='${x}' ></a>`
    }
    paginacion.innerHTML+="</center>";
    
}

document.getElementById("cbopacientes").addEventListener("change",consulta)