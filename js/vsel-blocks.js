"use strict";

(function () {
	var _wp = wp,
		_wp$serverSideRender = _wp.serverSideRender,
		createElement = wp.element.createElement,
		ServerSideRender = _wp$serverSideRender === void 0 ? wp.components.ServerSideRender : _wp$serverSideRender,
		_ref = wp.blockEditor || wp.editor,
		InspectorControls = _ref.InspectorControls,
		_wp$components = wp.components,
		TextareaControl = _wp$components.TextareaControl,
		Button = _wp$components.Button,
		PanelBody = _wp$components.PanelBody,
		Placeholder = _wp$components.Placeholder,
		SelectControl = _wp$components.SelectControl,
		registerBlockType = wp.blocks.registerBlockType;

	registerBlockType('vsel/vsel-event-list-block', {
		title: vsel_block_editor.i18n.title,
		icon: 'calendar',
		category: 'widgets',
		attributes: {
			noNewChanges: {
				type: 'boolean',
			},
			shortcodeSettings: {
				type: 'string',
			},
			executed: {
				type: 'boolean'
			},
			listType: {
				type: 'string',
			}
		},
		edit: function edit(props) {
			var _props = props,
				setAttributes = _props.setAttributes,
				_props$attributes = _props.attributes,
				_props$attributes$sho = _props$attributes.shortcodeSettings,
				shortcodeSettings = _props$attributes$sho === void 0 ? vsel_block_editor.shortcodeSettings : _props$attributes$sho,
				_props$attributes$cli = _props$attributes.noNewChanges,
				noNewChanges = _props$attributes$cli === void 0 ? true : _props$attributes$cli,
				_props$attributes$exe = _props$attributes.executed,
				executed = _props$attributes$exe === void 0 ? false : _props$attributes$exe,
				_props$attributes$eve= _props$attributes.listType,
				listType = _props$attributes$eve === void 0 ? 0 : _props$attributes$eve,
				listOptions = vsel_block_editor.listTypes.map( value => (
					{ value: value.id, label: value.label }
				) );

			function setState(shortcodeSettingsContent) {
				setAttributes({
					noNewChanges: false,
					shortcodeSettings: shortcodeSettingsContent
				});
			}

			function selectType( value ) {
				setAttributes( { listType: value } );
			}

			function previewClick(content) {
				setAttributes({
					noNewChanges: true,
					executed: false,
				});
			}

			function afterRender() {
				setAttributes({
					executed: true,
				});
			}

			var jsx;

				jsx = [React.createElement(InspectorControls, {
					key: "vsel-gutenberg-setting-selector-inspector-controls"
				}, React.createElement(PanelBody, {
					title: vsel_block_editor.i18n.addSettings
				},React.createElement(SelectControl, {
					label: vsel_block_editor.i18n.listType,
					value: listType,
					options: listOptions,
					onChange: selectType
				}),React.createElement(TextareaControl, {
					key: "vsel-gutenberg-settings",
					className: "vsel-gutenberg-settings",
					label: vsel_block_editor.i18n.shortcodeSettings,
					help: vsel_block_editor.i18n.example + ": 'posts_per_page=\"5\" pagination=\"false\"'",
					value: shortcodeSettings,
					onChange: setState
				}), React.createElement(Button, {
					key: "vsel-gutenberg-preview",
					className: "vsel-gutenberg-preview",
					onClick: previewClick,
					isDefault: true
				}, vsel_block_editor.i18n.preview)))];

				if (noNewChanges) {
					afterRender();
					jsx.push(React.createElement(ServerSideRender, {
						key: "vsel-event-list/vsel-event-list",
						block: "vsel/vsel-event-list-block",
						attributes: props.attributes,
					}));
				} else {
					props.attributes.noNewChanges = false;
					jsx.push(React.createElement(Placeholder, {
						key: "vsel-gutenberg-setting-selector-select-wrap",
						className: "vsel-gutenberg-setting-selector-select-wrap"
					}, React.createElement(Button, {
						key: "vsel-gutenberg-preview",
						className: "vsel-gutenberg-preview",
						onClick: previewClick,
						isDefault: true
					}, vsel_block_editor.i18n.preview)));
				}

			return jsx;
		},
		save: function save() {
			return null;
		}
	});
})();