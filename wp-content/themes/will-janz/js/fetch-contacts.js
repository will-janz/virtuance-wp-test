// TODO: Move this to a plugin or something
jQuery(document).ready(function($) {
	let table = document.getElementById('contactsTable');
	if (table) {
		$.post(my_ajax_obj.ajax_url, {
			_ajax_nonce: my_ajax_obj.nonce,
			action: 'fetch_contacts',
			title: this.value
		}, function(contacts) {
			contacts = JSON.parse(contacts);
			table.innerHTML = '';
			contacts.forEach((contact) => {
				table.innerHTML += `<tr><td>${contact.first_name}</td><td>${contact.last_name}</td><td>${contact.email}</td></tr>`;
			});
		});
	}
});
