(function(){

courseList = function(){
	$.ajax({
		type:'GET',
		url: 'api/courseList.php',
		dataType: 'json',
		success: function(data){
			console.log(data);
			$('#course').empty();
			$('#course').append($('<option>', {
			    value: '',
			    text: ''
			}));


			$.each(data, function(){
				$('#course').append($('<option>', {
				    value: this['courseAbbr'],
				    text: this['courseAbbr']
				}));

			});
		}
	})
}

courseInfo = function(){
	if ( $("#course").val() == ""){
		alert("Please select a course.");
	} else {
		$.ajax({
			type:'GET',
			url: 'api/courseInfo.php',
			dataType: 'json',
			data: {
				course:$("#course").val(),
			},
			success: function(data){
				console.log(data);

				contentData = '';
				contentData +=  '<div class=row">id: '+ ' ' + data['courseInfo']['_id'] + '</div>';
				contentData +=  '<div class=row">Name: '+ ' ' + data['courseInfo']['name'] + '</div>';
				contentData +=  '<div class=row">Degree: '+ ' ' + data['courseInfo']['degree'] + '</div>';
				contentData +=  '<div class=row">Abbr: '+ ' ' + data['courseInfo']['abbreviation'] + '</div>';
				contentData +=  '<div class=row">Credit: '+ ' ' + data['courseInfo']['creditHours'] + '</div>';
				contentData +=  '</div>';
				$("#apiResponse").html(contentData);
			}
		})
	}
}

$("#getCourseInfo").click(function(e){
	console.log('getCourseInfo');
	courseInfo();
})


courseList();

})();
