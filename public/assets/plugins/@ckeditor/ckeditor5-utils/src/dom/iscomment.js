/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
/* globals Node */
/**
 * @module utils/dom/iscomment
 */
/**
 * Checks whether the object is a native DOM Comment node.
 */
export default function isComment(obj) {
    return obj && obj.nodeType === Node.COMMENT_NODE;
}
