$(document).ready(function(){
    $("#tbUser").on('click','.remove-row', function(){
        const row = $(this).closest('tr');
        row.remove();
        $("#tbUser tr:first").after("<tr class=\"row\">" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
      "</tr>");
        });
    $("#tbUser").on('click','.add-row',function(){
        const row = $(this).closest('tr');
        $("<tr class=\"row\">" +
            "<td><button class=\"remove-row\">Remove</button></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td><button class=\"add-row\">Add</button></td>" +
          "</tr>").insertAfter(row);
    });

    $('table').on('click', 'td', function(){
        const tdId = $(this).closest('td').index();
        if ( tdId == 0 || tdId == 6){
            return;
        }
        const id = $(this).closest('tr').index();
        const firstName = $('#tbUser tr').eq(id).find('td').eq(1).text();
        const lastName = $('#tbUser tr').eq(id).find('td').eq(2).text();
        const age = $('#tbUser tr').eq(id).find('td').eq(3).text();
        const favTech = $('#tbUser tr').eq(id).find('td').eq(4).text();
        const favIDE = $('#tbUser tr').eq(id).find('td').eq(5).text();
        const editable = "< ... />";
        if (firstName == editable || lastName == editable || age == editable || favTech == editable || favIDE == editable){
            $(this).closest('td').attr('contenteditable', 'true');}
        else{
            alert("Row read only!");
            $(this).closest('td').attr('contenteditable', 'false');
        }
    })
});
