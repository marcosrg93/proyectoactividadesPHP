{"filter":false,"title":"backend.js","tooltip":"/actividades/js/backend.js","undoManager":{"mark":45,"position":45,"stack":[[{"start":{"row":0,"column":0},"end":{"row":32,"column":0},"action":"insert","lines":["/* global $ */","(function() {","","    $('#btActividad').on('click', function() {","","    });","","","    $('#btProfesor').on('click', function() {","","    });","","","    $('#btGrupos').on('click', function() {","","    });","","","    $('#btPerfil').on('click', function() {","","    });","","","","","","","","","","","}());",""],"id":1}],[{"start":{"row":25,"column":0},"end":{"row":39,"column":7},"action":"insert","lines":["","    $('#btLogout').on('click', function(){","        $.ajax({","            url: 'index.php',","            data: {","                ruta: 'profesor',","                accion: 'logout'"," ","            },","            type: 'GET',","            dataType: 'json'","        }).done(function(objetoJson) {","            logout();","        });","    });"],"id":2}],[{"start":{"row":39,"column":7},"end":{"row":40,"column":0},"action":"insert","lines":["",""],"id":3},{"start":{"row":40,"column":0},"end":{"row":40,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":40,"column":4},"end":{"row":41,"column":0},"action":"insert","lines":["",""],"id":4},{"start":{"row":41,"column":0},"end":{"row":41,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":41,"column":4},"end":{"row":42,"column":0},"action":"insert","lines":["",""],"id":5},{"start":{"row":42,"column":0},"end":{"row":42,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":49,"column":0},"end":{"row":50,"column":0},"action":"insert","lines":["",""],"id":7}],[{"start":{"row":50,"column":0},"end":{"row":51,"column":0},"action":"insert","lines":["",""],"id":8}],[{"start":{"row":51,"column":0},"end":{"row":52,"column":0},"action":"insert","lines":["",""],"id":9}],[{"start":{"row":52,"column":0},"end":{"row":62,"column":5},"action":"insert","lines":[" function logout(){","        $(location).attr('href', 'index.php');","        // $('#divLogin').show();","        // $('#divLogout').hide();","        // $('#divOcultar').show();","        // $('#divRowPage').hide();","        // $('#divRowUsuarios').hide();","        // $('#divRowUsuarios').empty();","        // $('.pagina-borrar').remove();","        // $('#divUser').empty();","    }"],"id":10}],[{"start":{"row":54,"column":8},"end":{"row":61,"column":33},"action":"remove","lines":["// $('#divLogin').show();","        // $('#divLogout').hide();","        // $('#divOcultar').show();","        // $('#divRowPage').hide();","        // $('#divRowUsuarios').hide();","        // $('#divRowUsuarios').empty();","        // $('.pagina-borrar').remove();","        // $('#divUser').empty();"],"id":11}],[{"start":{"row":54,"column":0},"end":{"row":54,"column":8},"action":"remove","lines":["        "],"id":12}],[{"start":{"row":53,"column":46},"end":{"row":54,"column":0},"action":"remove","lines":["",""],"id":13}],[{"start":{"row":26,"column":41},"end":{"row":26,"column":42},"action":"insert","lines":[" "],"id":14},{"start":{"row":32,"column":0},"end":{"row":32,"column":1},"action":"remove","lines":[" "]},{"start":{"row":40,"column":0},"end":{"row":42,"column":4},"action":"remove","lines":["    ","    ","    "]},{"start":{"row":46,"column":0},"end":{"row":48,"column":0},"action":"insert","lines":["","",""]},{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"remove","lines":[" "]},{"start":{"row":52,"column":17},"end":{"row":52,"column":18},"action":"insert","lines":[" "]},{"start":{"row":53,"column":0},"end":{"row":53,"column":4},"action":"remove","lines":["    "]},{"start":{"row":54,"column":0},"end":{"row":54,"column":4},"action":"remove","lines":["    "]},{"start":{"row":54,"column":1},"end":{"row":55,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":7,"column":0},"end":{"row":11,"column":0},"action":"remove","lines":["","    $('#btProfesor').on('click', function() {","","    });",""],"id":15}],[{"start":{"row":6,"column":0},"end":{"row":7,"column":0},"action":"remove","lines":["",""],"id":16}],[{"start":{"row":5,"column":7},"end":{"row":6,"column":0},"action":"remove","lines":["",""],"id":17}],[{"start":{"row":39,"column":0},"end":{"row":40,"column":0},"action":"remove","lines":["",""],"id":18}],[{"start":{"row":38,"column":0},"end":{"row":39,"column":0},"action":"remove","lines":["",""],"id":19}],[{"start":{"row":37,"column":0},"end":{"row":38,"column":0},"action":"remove","lines":["",""],"id":20}],[{"start":{"row":36,"column":0},"end":{"row":37,"column":0},"action":"remove","lines":["",""],"id":21}],[{"start":{"row":35,"column":0},"end":{"row":36,"column":0},"action":"remove","lines":["",""],"id":22}],[{"start":{"row":34,"column":0},"end":{"row":35,"column":0},"action":"remove","lines":["",""],"id":23}],[{"start":{"row":33,"column":7},"end":{"row":34,"column":0},"action":"remove","lines":["",""],"id":24}],[{"start":{"row":34,"column":0},"end":{"row":35,"column":0},"action":"insert","lines":["",""],"id":25}],[{"start":{"row":38,"column":0},"end":{"row":38,"column":1},"action":"insert","lines":["f"],"id":26}],[{"start":{"row":38,"column":1},"end":{"row":38,"column":2},"action":"insert","lines":["u"],"id":27}],[{"start":{"row":38,"column":2},"end":{"row":38,"column":3},"action":"insert","lines":["n"],"id":28}],[{"start":{"row":38,"column":0},"end":{"row":38,"column":3},"action":"remove","lines":["fun"],"id":29},{"start":{"row":38,"column":0},"end":{"row":38,"column":8},"action":"insert","lines":["function"]}],[{"start":{"row":38,"column":8},"end":{"row":38,"column":9},"action":"insert","lines":[" "],"id":30}],[{"start":{"row":38,"column":9},"end":{"row":38,"column":10},"action":"insert","lines":["l"],"id":31}],[{"start":{"row":38,"column":10},"end":{"row":38,"column":11},"action":"insert","lines":["o"],"id":32}],[{"start":{"row":38,"column":9},"end":{"row":38,"column":11},"action":"remove","lines":["lo"],"id":33},{"start":{"row":38,"column":9},"end":{"row":38,"column":17},"action":"insert","lines":["logout()"]}],[{"start":{"row":38,"column":17},"end":{"row":38,"column":18},"action":"insert","lines":["{"],"id":34}],[{"start":{"row":38,"column":18},"end":{"row":38,"column":19},"action":"insert","lines":["}"],"id":35}],[{"start":{"row":38,"column":18},"end":{"row":40,"column":0},"action":"insert","lines":["","    ",""],"id":36}],[{"start":{"row":38,"column":15},"end":{"row":38,"column":16},"action":"insert","lines":["A"],"id":37}],[{"start":{"row":38,"column":16},"end":{"row":38,"column":17},"action":"insert","lines":["j"],"id":38}],[{"start":{"row":38,"column":17},"end":{"row":38,"column":18},"action":"insert","lines":["s"],"id":39}],[{"start":{"row":38,"column":17},"end":{"row":38,"column":18},"action":"remove","lines":["s"],"id":40}],[{"start":{"row":38,"column":17},"end":{"row":38,"column":18},"action":"insert","lines":["a"],"id":41}],[{"start":{"row":38,"column":18},"end":{"row":38,"column":19},"action":"insert","lines":["x"],"id":42}],[{"start":{"row":39,"column":4},"end":{"row":50,"column":11},"action":"insert","lines":["$.ajax({","            url: 'index.php',","            data: {","                ruta: 'profesor',","                accion: 'logout'","","            },","            type: 'GET',","            dataType: 'json'","        }).done(function(objetoJson) {","            logout();","        });"],"id":43}],[{"start":{"row":21,"column":7},"end":{"row":32,"column":11},"action":"remove","lines":[" $.ajax({","            url: 'index.php',","            data: {","                ruta: 'profesor',","                accion: 'logout'","","            },","            type: 'GET',","            dataType: 'json'","        }).done(function(objetoJson) {","            logout();","        });"],"id":44},{"start":{"row":21,"column":7},"end":{"row":21,"column":8},"action":"insert","lines":["l"]}],[{"start":{"row":21,"column":8},"end":{"row":21,"column":9},"action":"insert","lines":["o"],"id":45}],[{"start":{"row":21,"column":7},"end":{"row":21,"column":9},"action":"remove","lines":["lo"],"id":46},{"start":{"row":21,"column":7},"end":{"row":21,"column":19},"action":"insert","lines":["logoutAjax()"]}],[{"start":{"row":21,"column":19},"end":{"row":21,"column":20},"action":"insert","lines":[";"],"id":47}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":41,"column":0},"end":{"row":41,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":317,"mode":"ace/mode/javascript"}},"timestamp":1487078189492,"hash":"b720b94d0bcce9de7103a9fc1a03c8a301ea5761"}