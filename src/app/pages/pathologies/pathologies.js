$(document).ready(function() {
    $.get('pathologiesAll', function(data) {
        $('#content').html(data);
    });
})

$("#allPathoBtn").click(function(e) {
    $.get('pathologiesAll', function(data) {
        $('#content').html(data);
    });
    document.getElementById("filteredPathoBtn").classList.remove('active');
    document.getElementById("allPathoBtn").classList.add('active');
});

$("#filteredPathoBtn").click(function() {
    $.get('pathologiesFiltered', function(data) {
        $('#content').html(data);
    });
    $.get('pathoList', function(data) {
        $('#pathos').html(data);
    });
    document.getElementById("allPathoBtn").classList.remove('active');
    document.getElementById("filteredPathoBtn").classList.add('active');
});

$('#content').on('show.bs.collapse', function(e) {
    switch(e.target.id) {
        case "collapseOne":
            $.get('pathoList?type[]=me&type[]=mi', function(data) {
                e.target.innerHTML = data;
            });
            break;

        case "collapseTwo":
            $.get('pathoList?type[]=tf', function(data) {
                e.target.innerHTML = data;
            });
            break;

        case "collapseThree":
            $.get('pathoList?type[]=j', function(data) {
                e.target.innerHTML = data;
            });
            break;

        case "collapseFour":
            $.get('pathoList?type[]=l', function(data) {
                e.target.innerHTML = data;
            });
            break;
        
        case "collapseFive":
            $.get('pathoList?type[]=mv', function(data) {
                e.target.innerHTML = data;
            });
            break;

        default:
            getSymptoms(e);
            break;
    }
});

function getSymptoms($e) {
    $idPatho = $e.target.id;
    $url = 'symptomsList?idPatho=' + $idPatho;
    console.log($url);
    $.get($url, function(data) {
        $e.target.innerHTML = data;
    });
}

function filterByType() {
    var typeSelected = document.getElementById("typeSelector").value;

    var infos = document.getElementsByClassName("infos");

    if (typeSelected != -1) {
        for(i = 0; i < infos.length; i++) {
            var type = infos[i].getElementsByClassName("typeColumn");
            if (type[0].innerHTML != typeSelected) {
                infos[i].style.display = "none";
            } else {
                if (infos[i].style.display != "none") {
                    infos[i].style.display = "";
                }
            }
        }
    }
}

function filterByMeridienCode() {
    var meridienCodeSelector = document.getElementById("meridienCodeSelector").value;

    var infos = document.getElementsByClassName("infos");

    if (meridienCodeSelector != -1) {
        for(i = 0; i < infos.length; i++) {
            var type = infos[i].getElementsByClassName("meridienCodeColumn");
            if (type[0].innerHTML != meridienCodeSelector) {
                infos[i].style.display = "none";
            } else {
                if (infos[i].style.display != "none") {
                    infos[i].style.display = "";
                }
            }
        }
    }
}

function filterByCaracteristic() {
    var caracteristicSelector = document.getElementById("caracteristicSelector").value;

    var infos = document.getElementsByClassName("infos");

    if (caracteristicSelector != -1) {
        for(i = 0; i < infos.length; i++) {
            var type = infos[i].getElementsByClassName("descColumn");
            if (!type[0].innerHTML.includes(caracteristicSelector)) {
                infos[i].style.display = "none";
            } else {
                if (infos[i].style.display != "none") {
                    infos[i].style.display = "";
                }
            }
        }
    }
}

function filter() {
    resetList();
    closeSymptoms();
    filterByMeridienCode();
    filterByType();
    filterByCaracteristic();
}

function resetList() {
    var meridienCodeSelector = document.getElementById("meridienCodeSelector").value;
    var infos = document.getElementsByClassName("infos");

    for(i = 0; i < infos.length; i++) {
        infos[i].style.display = "";
    }
}

function closeSymptoms() {
    var table = document.getElementById("patho-table");
    var symptoms = table.getElementsByClassName("symptomsChips");
    console.log(symptoms);

    for(i = 0; i < symptoms.length; i++) {
        symptoms[i].classList.remove('show');
    }
}