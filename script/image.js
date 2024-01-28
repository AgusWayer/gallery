function previewImage(input,preview,previewCont){
	let inputFile = document.getElementById(`${input}`)
	
	let previewContainer = document.getElementById(`${previewCont}`)
	const file = inputFile.files[0]
	if(file){
		previewContainer.innerHTML = `
		<div class=" text-center py-2">
			<img src="#" class="w-50" id="preview" >
		</div>
		`
		let previewImage = document.getElementById(`${preview}`)
		const reader = new FileReader()
		reader.onload = (e)=>{
			previewImage.src = e.target.result
		}
		reader.readAsDataURL(file)
	} else{
		previewImage.src = '#'
	}
}