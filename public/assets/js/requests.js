$('#accordionDocs').on('show.bs.collapse', function (e) {
    $(e.target).find('.refresh-request').click();
});

function getRequest(url, target)
{
    if(url.includes(BASE_URL)) {
        $.ajax({
            url: url
        }).done(function(response) {
            showRequest(response, target);
        });
    }
}

function showRequest(data, target)
{
    const highlighted = hljs.highlight('json', JSON.stringify(data, null, 4)).value;
    $('#'+target).find('code.json').html(highlighted);
}
