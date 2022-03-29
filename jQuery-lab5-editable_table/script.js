$(document).ready(function(){
    $("#table-users").on('click','.remove-row',function(){
        const row = $(this).closest('tr');
        row.remove();
        $("#table-users tr:first").after(
          "<tr class=\"row\">" +
          "<td></td>" +
          "<td></td>" +
          "<td></td>" +
          "<td></td>" +
          "<td></td>" +
          "<td></td>" +
          "<td></td>" +
          "</tr>"
        );
        });
    $("#table-users").on('click','.add-row',function(){
        const row = $(this).closest('tr');
        $(
            "<tr class=\"row\">" +
            "<td><button class=\"remove-row\">Remove</button></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td>< ... /></td>" +
            "<td><button class=\"add-row\">Add</button></td>" +
          "</tr>"
        ).insertAfter(row);
    });

    $('table').on('click', 'td', function(){
        const tdId = $(this).closest('td').index();
        if ( tdId == 0 || tdId == 6){
            return;
        }
        const id = $(this).closest('tr').index();
        const firstName = $('#table-users tr').eq(id).find('td').eq(1).text();
        const lastName = $('#table-users tr').eq(id).find('td').eq(2).text();
        const age = $('#table-users tr').eq(id).find('td').eq(3).text();
        const favTech = $('#table-users tr').eq(id).find('td').eq(4).text();
        const favIde = $('#table-users tr').eq(id).find('td').eq(5).text();
        const editable = "< ... />";
        if (firstName == editable || lastName == editable || age == editable || favTech == editable || favIde == editable){
            $(this).closest('td').attr('contenteditable', 'true');
        }
        else{
            alert("Row read only!");
            $(this).closest('td').attr('contenteditable', 'false');
        }
    })
});
