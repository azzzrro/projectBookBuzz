// Basic
new SimpleMDE({
	element: document.getElementById("short_description"),
	spellChecker: false,
});

new SimpleMDE({
  element: document.getElementById("description"),
  spellChecker: false,
});

new SimpleMDE({
  element: document.getElementById("technical_specification"),
  spellChecker: false,
});

// Autosaving
new SimpleMDE({
	element: document.getElementById("demo2"),
	spellChecker: false,
	autosave: {
		enabled: true,
		unique_id: "demo2",
	},
});