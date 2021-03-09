import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import './style.scss';

import Edit from './edit';
import save from './save';

registerBlockType('gbe/card-with-inner-blocks', {
    apiVersion: 2,
    title: __('UiKit Card with Inner Blocks', 'gutenberg-block-examples'),
    description: __(
        'UiKit Card with  Inner Blocks',
        'gutenberg-block-examples'
    ),
    category: 'uikit',
    icon: 'smiley',
    keywords: [
        __('Card With Inner Blocks', 'gutenberg-block-examples'),
        __('inner Component', 'gutenberg-block-examples'),
        __('ui kit UiKit card inner', 'gutenberg-block-examples')
    ],
    attributes: {
        cardTitle: {
            type: 'string',
            source: 'html',
            selector: '.uk-card-title',
        },
        jobTitle: {
            type: 'string',
            source: 'html',
            selector: '.job-title',
        },
        imgSrc: {
            type: 'text',
            source: 'attribute',
            attribute: 'src',
            selector: '.uk-border-circle',
        },
        buttonLabel: {
            type: 'string',
            source: 'text',
            selector: '.gbe-btn-url',
            default: __('Read More', 'gutenberg-block-examples')
        },
        buttonUrl: {
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.gbe-btn-url'
        }
    },

    /**
     * @see ./edit.js
     */
    edit: Edit,

    /**
     * @see ./save.js
     */
    save,
});
