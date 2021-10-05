
function cerrar(){
    document.getElementById("mensaje").innerHTML="";

}

new Vue({
    el: "#app",
    data() {
        return {
            idproducto: null,
            pacproducto: null,
            apellidos: null,
            nombres: null,
            dni:null,
            correo: null,
            telefono: null,
            titulo:"Activacion del contrato SigFox",
            mensaje:"Siguiente",
            etapa:1,
        }
    },
    
    methods: {
        comprobariddispositivo() {

            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "idproducto": this.idproducto,
            };
            if(this.idproducto!=null && this.idproducto.trim()!=""){

            if(/([A-Z0-9])/.test(this.idproducto)){
                document.getElementById("id").setAttribute("style","border:2px solid green");
            }else{
                document.getElementById("id").setAttribute("style","border:2px solid red");
            }
            }
        },
        comprobarpacdispositivo(e) {
            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "pacproducto": this.pacproducto,
            };
            if(this.pacproducto!=null && this.pacproducto.trim()!=""){

                if(/([A-Z0-9])/.test(this.pacproducto)){
                    document.getElementById("pac").setAttribute("style","border:2px solid green");
                }else{
                    document.getElementById("pac").setAttribute("style","border:2px solid red");
                }
            }
        },
        siguiente(){

            if(this.etapa!=3){
            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "pacproducto": this.pacproducto,
                "idproducto": this.idproducto
            };
            if(this.pacproducto!=null && this.pacproducto.trim()!="" && this.idproducto!=null && this.idproducto.trim()!=""){
            fetch(url, {
                body: JSON.stringify(peticion),
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
              })
                .then((res) => res.json())
                .then((data) =>{
                    if(data=="1"){
                        console.log("hola");
                        this.etapa=2;
                        this.titulo="Registro Cliente";
                        document.getElementById("messageid").innerHTML=`<h4></h4>`;
                        document.getElementById("messagepac").innerHTML=`<h4></h4>`;
                    }else{
                    document.getElementById("pac").setAttribute("style","border:2px solid red");
                    document.getElementById("id").setAttribute("style","border:2px solid red");
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Pac o Id incorrecto / o se encuentra activo',
                      })
                    }
                    
                })
                .catch(function(error) {
                    
                  });
                }else{
                    document.getElementById("pac").setAttribute("style","border:2px solid red");
                    document.getElementById("id").setAttribute("style","border:2px solid red");
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Rellene todos los campos',
                      })
                }
            }else{
                window.location.replace("index.php");
                document.getElementById("messagestep1").innerHTML=`<h4></h4>`;
            }
        },
        
        validar_email(){
            if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(this.correo)){
                document.getElementById("correo").setAttribute("style","border:2px solid green");
                
                return true;
               } else {
                document.getElementById("correo").setAttribute("style","border:2px solid red");
                alert("La dirección de email no valida");
                return false;
               }
        },
        validar_telefono(){
            let dato= Array.from((this.telefono.trim()));
            if((dato.length<7 || dato.length>11)&& /([0-9])/.test(this.telefono.trim()) ){
                alert("el telefono debe ser de 7 a 11 caracteres numericos");
                document.getElementById("telefono").setAttribute("style","border:2px solid red");
                return false;
            }else{
                document.getElementById("telefono").setAttribute("style","border:2px solid green");
                return true;
            }
        },
        
        validar_dni(){
            let dato= Array.from((this.dni.trim()));
            if(dato.length<8 || dato.length>8 && !(/([0-9])/.test(this.dni.trim())) ){
                alert("el dni debe ser de 8 caracteres numericos ");
                document.getElementById("dni").setAttribute("style","border:2px solid red");
                
                return false;
            }else{
                document.getElementById("dni").setAttribute("style","border:2px solid green");
                return true;
            }

        },
        validar_ape(){
            let dato= Array.from((this.apellidos.trim()));
            console.log(typeof dato)
            console.log(this.apellidos)
            console.log('hola mundo')
            if(dato.length!=8 && !(/^[A-Z\s]+$/i.test(this.apellidos.trim()))){
                alert("formato de nombre invalido");
                document.getElementById("apellidos").setAttribute("style","border:2px solid red");
                return false;
            }else{
                document.getElementById("apellidos").setAttribute("style","border:2px solid green");
                return true;
            }
        },
        validar_name(){
            let dato= Array.from((this.nombres.trim()));
            console.log(typeof dato)
            console.log(this.nombres)
            console.log('hola mundo')
            if(dato.length!=8 && !(/^[A-Z\s]+$/i.test(this.nombres.trim()))){
                alert("formato de nombre invalido");
                document.getElementById("nombres").setAttribute("style","border:2px solid red");
                return false;
            }else{
                document.getElementById("nombres").setAttribute("style","border:2px solid green");
                return true;
            }
        },
        registrar_pedido(){
                
            var url = './controladores/api_dispositivo.php';
            var peticion = {
                "pacproducto": this.pacproducto,
                "idproducto": this.idproducto,
                "nombres":this.nombres,
                "apellidos":this.apellidos,
                "dni":this.dni,
                "correo":this.correo,
                "telefono":this.telefono
            };
            
            if(this.pacproducto!=null && this.pacproducto.trim()!="" && this.idproducto!=null && this.idproducto.trim()!=""&&this.nombres!=null && this.nombres.trim()!=""&&this.apellidos!=null && this.apellidos.trim()!=""&&this.correo!=null && this.correo.trim()!=""&&this.telefono!=null && this.telefono.trim()!=""){
            if(this.validar_dni&&this.validar_telefono&&this.validar_email&&this.validar_name){
                fetch(url, {
                body: JSON.stringify(peticion),
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
              })
                .then((res) => res.json())
                .then((data) =>{
                    if(data=="1"){
                        this.etapa=3;
                        this.mensaje="Volver al inicio";
                        
                    }else{
                        alert("error al registras solicitud de activacion. Vuelva a intentarlo");
                    }
                    
                })
                .catch(function(error) {
                    console.log('Hubo un problema con la petición ' + error.message);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error el el Dispositivo ya ha sido registrado',
                      })
                  });
                }else{
                    // alert("rellene todo los campos primero");
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Rellene todos los campos',
                      })
                }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Rellene todos los campos',
                      })
                }
        },
        goBack() {
            if(this.etapa==1){
                window.history.back();
            }if(this.etapa==2){
                this.etapa=1;
                this.titulo="Activacion Dispositivo";
            }
            
          },
          terminar(){
            window.history.back();
          }
    },
})