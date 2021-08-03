$(document).ready(function() {

   


    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000);

    

    let datatableInstance = $('#tablaProductos').DataTable({
        // cargamos los datos consumiendo el Json con ajax 
        "ajax": {
            "url": "../../Controller/Productos.php",
            
        },
        "columnDefs": [{
            "className": "dt-center",
            "targets": "_all"
        }],
        "columns": [{
                "data": "CATP_NOMBRE"
            },
            {
                "data": "PRO_CODIGO"
            },
            {
                "data": "PRO_NOMBRE"
            },

            {
                "data": "PRO_DESCRIPCION"
            },
            {
                "data": "PRO_PRECIOCOMPRA"
            },
            {
                "data": "PRO_IVA"
            },
            {
                "data": "PRO_PRECIO_VENTA"
            },
            
            {
                "data": "PRO_STOCK_MAX"
            },
            {
                "data": "PRO_STOCK_MIN"
            },
            {
                "defaultContent": " <button type='button' data-toggle='modal' data-target='#AbastecerModal' class='abastecer btn btn-primary btn-sm ' title='Abastecer'><i class='fa fa-plus' aria-hidden='true'></i>  Abastecer </button>  <button type='button' data-toggle='modal' data-target='#VenderModal'  class='vender btn btn-warning btn-sm' title='Vender'> Vender <i class='fa fa-sign-in' aria-hidden='true'></i>  </button>  "

            }
        ],

        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        responsive: true,


    });
    $("#btnAbastecer").on("click", function() {
     
        actualizar();


    })

    $("#btnVender").on("click", function() {
     
        vender();


    })
   

    Obtener_Data("#tablaProductos tbody", datatableInstance);
    Obtener_Data_V("#tablaProductos tbody", datatableInstance);
   // Obtener_Data_Editar("#tablaProductos tbody", datatableInstance);

});

let Obtener_Data= function(tbody, datatableInstance) {
    $(tbody).on('click', 'button.abastecer', function() {
        var data = datatableInstance.row($(this).parents("tr")).data();
         //console.log(data);

        //Capturamos los valores de la base en cada campo de texto del modal editar

        let idPro = $("#idPro").val(data.PRO_ID)
           // cantidad = $("#txtCantidad").val(data.PRO_STOCK_MAX)            

    });
}

let Obtener_Data_V= function(tbody, datatableInstance) {
    $(tbody).on('click', 'button.vender', function() {
        var data = datatableInstance.row($(this).parents("tr")).data();
         //console.log(data);

        //Capturamos los valores de la base en cada campo de texto del modal editar

        let idProV = $("#idProV").val(data.PRO_ID),
            precio = $("#precio").val(data.PRO_PRECIO_VENTA)
           // cantidad = $("#txtCantidad").val(data.PRO_STOCK_MAX)            

    });
}

/*let Obtener_Data_Editar= function(tbody, datatableInstance) {
    $(tbody).on('click', 'button.edit', function() {
        var data = datatableInstance.row($(this).parents("tr")).data();
         //console.log(data);

        //Capturamos los valores de la base en cada campo de texto del modal editar

        let idp = $("#idp").val(data.PRO_ID),
            ctpE = $("#ctpE").val(data.CATP_ID).html(data.CATP_NOMBRE),
            cp = $("#cp").val(data.PRO_CODIGO),
            np = $("#np").val(data.PRO_NOMBRE),
            pcp = $("#pcp").val(data.PRO_PRECIOCOMPRA),
            iva = $("#iva").val(data.PRO_IVA),
            pvp = $("#pvp").val(data.PRO_PRECIO_VENTA),            
            ctdp = $("#ctdp").val(data.PRO_STOCK_MAX),
            ctdpmi = $("#ctdpmi").val(data.PRO_STOCK_MIN),
            desp = $("#desp").val(data.PRO_DESCRIPCION)  
         });
}*/

let actualizar = function() {
    let urlA = "../../Controller/ProdcutoController.php";
    let dataformA = $("#formAbastecer").serialize();
    dataformA = "accion=actualizar&" + dataformA;
    $.post(urlA, dataformA).done((rsu) => {
        console.log(rsu)
        if (rsu.success == true) {
            // alert("Registro Modificado")
            //$(".input").val("");
            $(".input").val("");
            $("#AbastecerModal").modal('hide');            
           // location.reload();
           // toastr.success('Producto Abastecido');
           // window.location.reload(null, false);
           
           
            window.location.reload(null, false);
            toastr.success('Producto Abastecido');


            //$('.dataTable').DataTable().ajax.reload(null, false);
            console.log(rsu.success)

        } else {
            console.log(rsu.mensaje)
        }
    })
}

let vender = function() {
    let urlV = "../../Controller/ProdcutoController.php";
    let dataformV = $("#formVender").serialize();
    dataformV = "accion=vender&" + dataformV;
    $.post(urlV, dataformV).done((rsv) => {
        console.log(rsv)
        if (rsv.success == true) {
            // alert("Registro Modificado")
            $(".input").val("");
            $("#VenderModal").modal('hide');            
            toastr.success('Producto Vendido');
            //location.reload();
            $('.dataTable').DataTable().ajax.reload(null, false);
            console.log(rsv.success)

        } else {
            console.log(rsv.mensaje)
        }
    })
}