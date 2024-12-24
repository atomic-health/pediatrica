import { registerBlockExtension } from "@10up/block-components";
import { InspectorControls, BlockControls } from "@wordpress/block-editor";
import { ToggleControl, PanelBody, PanelRow, SelectControl, TextControl, ToolbarGroup, ToolbarButton } from "@wordpress/components";
import { __experimentalNumberControl as NumberControl } from '@wordpress/components';
import { moveTo } from '@wordpress/icons';

import './style.scss';
import './editor.scss';

const additionalAttributes = {
	hasAnimation: {
		type: "boolean",
		default: false
	},
	animationType: {
		type: "string",
		default: "fade-in"
	},
	animationDelay: {
		type: "string",
		default: "0"
	},
	animationDuration: {
		type: "string",
		default: "500"
	},
	animationStart: {
		type: "boolean",
		default: true
	}
};

const BlockEdit = (props) => {
	const setHasAnimation = (value) => {
		props.setAttributes({
			hasAnimation: value
		})
	};

	const setAnimationType = (value) => {
		props.setAttributes({
			animationType: value
		})
	}

	const setAnimationDelay = (value) => {
		props.setAttributes({
			animationDelay: value
		})
	}

	const setAnimationDuration = (value) => {
		props.setAttributes({
			animationDuration: value
		})
	}

	const setAnimationStart = (value) => {
		props.setAttributes({
			animationStart: value
		})
	}

	return (
		<>
		<InspectorControls>
			<PanelBody title="Animation Settings">
				<PanelRow className="animations__row--set">
					<ToggleControl
						__nextHasNoMarginBottom
						label="Enable animation on this block?"
						help="Set to true to select the animation."
						checked={ props.attributes.hasAnimation }
						onChange={ setHasAnimation }
					/>
				</PanelRow>
				{props.attributes.hasAnimation && (
					<PanelRow className="animations__row--start">
						<ToggleControl
							__nextHasNoMarginBottom
							label="Animate element on scroll?"
							help="If set to false, the animation will occur without needing to scroll."
							checked={ props.attributes.animationStart }
							onChange={ setAnimationStart }
						/>
					</PanelRow>
				)}
				{props.attributes.hasAnimation && (
					<PanelRow className="animations__row">
						<SelectControl
							__next40pxDefaultSize
							label="Animation type"
							labelPosition="left"
							value={ props.attributes.animationType }
							options={[
								{ label: "Default (Fade-in)", value: "fade-in" },
								{ label: "Fade-in up", value: "fade-in--up" },
								{ label: "Fade-in down", value: "fade-in--down" },
								{ label: "Scale up", value: "scale--up" },
								{ label: "Scale down", value: "scale--down" },
							]}
							onChange={ setAnimationType }
						/>	
					</PanelRow>
				)}
				{props.attributes.hasAnimation && (
					<PanelRow className="animations__row">
						<NumberControl
							__next40pxDefaultSize
							label="Delay (in ms)"
							labelPosition="side"
							step="100"
							min="0"
							max="5000"
							value={ props.attributes.animationDelay }
							onChange={ setAnimationDelay }
						/>
					</PanelRow>
				)}
				{props.attributes.hasAnimation && (
					<PanelRow className="animations__row">
						<NumberControl
							__next40pxDefaultSize
							label="Duration (in ms)"
							labelPosition="side"
							step="100"
							min="0"
							max="5000"
							value={ props.attributes.animationDuration }
							onChange={ setAnimationDuration }
						/>
					</PanelRow>
				)}
			</PanelBody>
		</InspectorControls>

		<BlockControls>
				<ToolbarGroup>
					{props.attributes.hasAnimation && (
						<ToolbarButton
							icon={ moveTo }
							label="This element has an animation"
							className="animation__toolbar-icon"
							disabled
						/>
					)}
				</ToolbarGroup>
		</BlockControls>
		</>
	)
};

const generateClassName = (attributes) => {
	let string = "";

	if ( attributes.hasAnimation ) { 
		string += 'block--animation';
	}

	if ( attributes.hasAnimation && attributes.animationType  === 'fade-in' ) {
		string += ' do--fade-in';
	}

	if ( attributes.hasAnimation && attributes.animationType  === 'fade-in--up' ) {
		string += ' do--fade-in-up';
	}

	if ( attributes.hasAnimation && attributes.animationType  === 'fade-in--down' ) {
		string += ' do--fade-in-down';
	}

	if ( attributes.hasAnimation && attributes.animationType  === 'scale--up' ) {
		string += ' do--scale-up';
	}

	if ( attributes.hasAnimation && attributes.animationType  === 'scale--down' ) {
		string += ' do--scale-down';
	}

	if( attributes.hasAnimation && attributes.animationDelay ) {
		string += ` do--animation-delay-${attributes.animationDelay}`;
	}

	if( attributes.hasAnimation && attributes.animationDuration ) {
		string += ` do--animation-duration-${attributes.animationDuration}`;
	}

	if( attributes.hasAnimation && !attributes.animationStart ) {
		string += ` do--animation`;
	}

	return string;
};

registerBlockExtension( [
	"core/group", 
	"core/column",
	"core/paragraph",
	"core/heading",
	"core/post-title"
], {
	extensionName: "animation-settings",
	attributes: additionalAttributes,
	classNameGenerator: generateClassName,
	Edit: BlockEdit,
});