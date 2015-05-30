$.ajax({
                    url: "input_data.php",
                    data: {
						"title"=$("#right-label").value,
						"houseSytem"= $('input[name="system"]:checked').value;
						"noofstoreys"=$('select').value;
						"Description"=$("#desc").value;
						"location"=$("#locate").value;
						"yearbuilt"=2050;
						"file1"=$("#f1").value;
						"file2"=$("#f2").value;
						"file3"=$("#f3").value;
						"file4"=$("#f4").value;
						"file5"$("#f5").value;
						},
                    dataType: 'json',
                    type: 'POST',
		success:function(data){
					
		});

