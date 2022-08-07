


document.addEventListener("DOMContentLoaded", () => {
	const themeSwitchButton = document.querySelector('#theme-toggle');
	if(localStorage.theme === 'dark') {
		themeSwitchButton.checked = true;
		document.documentElement.classList.add('dark');
	}
	themeSwitchButton.addEventListener('change', (e) => {
		if(e.target.checked){
			localStorage.setItem('theme', 'dark');
			document.documentElement.classList.add('dark');
		} else {
			localStorage.setItem('theme', 'light');
			document.documentElement.classList.remove('dark')
		}
	});


	//Modal search bar for sm
	const smSearchBbar = document.querySelector('#sm-search-bar');
	smSearchBbar.addEventListener('click', (e) => {
		e.preventDefault();
		console.log('asd');
		const smModal = document.querySelector('#sm-modal');
		smModal.classList.remove('hidden');
	});

});
