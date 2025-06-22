$(document).ready(function() {
    const $schoolFilter = $('.school-select');
    const $programTypeFilter = $('.program-type-select');

    // fetch and update programs
    function updatePrograms() {        
        const schoolId = $schoolFilter.val(); 
        const programTypeId = $programTypeFilter.val();
        
        location.href = `/programs?school=${schoolId}&program_type=${programTypeId}`;
    }

    const params = new URLSearchParams(window.location.search);
    if (params.has('school')) {
        $schoolFilter.val(params.get('school'));
    }
    if (params.has('program_type')) {
        $programTypeFilter.val(params.get('program_type'));
    }

    $schoolFilter.on('change', updatePrograms);
    $programTypeFilter.on('change', updatePrograms);



    $('.search_event').on('click', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);

            var $searchInput = $("#searchInput");

            searchParams.set('filter', $searchInput.val())

            url.search = searchParams.toString();

            location.href = url

    })

});

