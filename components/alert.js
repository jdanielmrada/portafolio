export default class Alert{
    constructor( alertid )
    {
        this.alert = document.getElementById(alertid);

    }

    show( message )
    {
        this.alert.classList.remove('d-none');
		this.alert.innerText = message;
    }

    hide()
    {
        this.alert.classList.add('d-none');
    }
}