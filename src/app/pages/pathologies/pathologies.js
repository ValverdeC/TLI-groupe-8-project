
$('#collapseOne').on('show.bs.collapse', function(e) {
    if (e.target.id == "collapseOne") {
        $.get('?page=pathoList&type[]=me&type[]=mi', function(data) {
            e.target.innerHTML = data;
        });
    } else {
        getSymptoms(e);
    }
});

$('#collapseTwo').on('show.bs.collapse', function(e) {
    if (e.target.id == "collapseTwo") {
        $.get('?page=pathoList&type[]=tf', function(data) {
            e.target.innerHTML = data;
        });
    } else {
        getSymptoms(e);
    }
});

$('#collapseThree').on('show.bs.collapse', function(e) {
    if (e.target.id == "collapseThree") {
        $.get('?page=pathoList&type[]=j', function(data) {
            e.target.innerHTML = data;
        });
    } else {
        getSymptoms(e);
    }
});

$('#collapseFour').on('show.bs.collapse', function(e) {
    if (e.target.id == "collapseFour") {
        $.get('?page=pathoList&type[]=l', function(data) {
            e.target.innerHTML = data;
        });
    } else {
        getSymptoms(e);
    }
});

$('#collapseFive').on('show.bs.collapse', function(e) {
    if (e.target.id == "collapseFive") {
        $.get('?page=pathoList&type[]=mv', function(data) {
            e.target.innerHTML = data;
        });
    } else {
        getSymptoms(e);
    }
});

function getSymptoms($e) {
    $idPatho = $e.target.id;
    $url = '?page=symptomsList&idPatho=' + $idPatho;
    console.log($url);
    $.get($url, function(data) {
        $e.target.innerHTML = data;
    });
}