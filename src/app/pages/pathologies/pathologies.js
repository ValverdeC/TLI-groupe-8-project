$(document).ready(function() {
    $.get('pathologiesAll', function(data) {
        $('#content').html(data);
    });
    var hash = window.location.hash;
    if(hash) {
        if(hash === "#filtered") {
            displayFilteredPatho();
        } else {
            displayAllPatho();
        }
    } else {
        displayAllPatho();
    }
});

$("#allPathoBtn").click(function(e) {
    displayAllPatho();
});

function displayAllPatho() {
    $.get('pathologiesAll', function(data) {
        $('#content').html(data);
    });
    document.getElementById("filteredPathoBtn").classList.remove('active');
    document.getElementById("allPathoBtn").classList.add('active');
    window.location.hash = 'all';
}

$("#filteredPathoBtn").click(function() {
    displayFilteredPatho();
});

function displayFilteredPatho() {
    $.get('pathologiesFiltered', function(data) {
        $('#content').html(data);
    });
    $.get('pathoList', function(data) {
        $('#pathos').html(data);
    });
    document.getElementById("allPathoBtn").classList.remove('active');
    document.getElementById("filteredPathoBtn").classList.add('active');
    window.location.hash = 'filtered';
}

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
            var hash = window.location.hash;
            if(hash) {
                if(hash !== "#filtered") {
                    getSymptoms(e);
                }
            } else {
                getSymptoms(e);
            }
            break;
    }
});

function getSymptoms($e) {
    $idPatho = $e.target.id;
    $url = 'symptomsList?idPatho=' + $idPatho;
    $.get($url, function(data) {
        var card = document.getElementById($idPatho);
        card.getElementsByClassName("card")[0].innerHTML = data;
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

function filterByKeyWord() {
    var keyWords = document.getElementById("keyWords").value;
    var keyWordsArray = [];

    if (keyWords != null && keyWords != '') {
        keyWords = keyWords.replace(/\s+/g,' '); // Suppression des espaces inutiles
        if (keyWords != ' ') {
            keyWordsArray = keyWords.toLowerCase().split(' ');
        } else {
            return;
        }
    } else {
        return;
    }
    
    var infos = document.getElementsByClassName("infos");

    if (keyWordsArray.length > 0) {
        for(i = 0; i < infos.length; i++) {
            //console.log(infos[i]);
            var type = infos[i].getElementsByClassName("symptColumn");

            keyWordsArray.forEach((word) => {
                if (!type[0].innerHTML.includes(word)) {
                    infos[i].style.display = "none";
                } else {
                    if (infos[i].style.display != "none") {
                        infos[i].style.display = "";
                    }
                }
            });
        }
    }
}

function filter() {
    resetList();
    closeSymptoms();
    filterByMeridienCode();
    filterByType();
    filterByCaracteristic();
    filterByKeyWord();
}

function resetList() {
    var infos = document.getElementsByClassName("infos");

    for(i = 0; i < infos.length; i++) {
        infos[i].style.display = "";
    }
}

function closeSymptoms() {
    var table = document.getElementById("patho-table");
    var symptoms = table.getElementsByClassName("symptomsChips");

    for(i = 0; i < symptoms.length; i++) {
        symptoms[i].classList.remove('show');
    }
}