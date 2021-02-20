/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import {__} from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import {useBlockProps, RichText} from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function Save({attributes, className}) {
    const blockProps = useBlockProps.save();
    return (
        <div {...blockProps}>
            <div
                className={`uk-card uk-card-default uk-card-body`}
                style={{backgroundColor: attributes.backgroundColor}}
            >
                <h3 className="uk-card-title"><RichText.Content value={attributes.cardTitle}/></h3>
                <div className={"uk-card-description"}><RichText.Content value={attributes.cardDescription}/></div>
            </div>
        </div>
    );
}
