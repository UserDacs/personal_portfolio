/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
/**
 * @module editor-classic/classiceditoruiview
 */
import { BoxedEditorUIView, InlineEditableUIView, MenuBarView, StickyPanelView, ToolbarView } from 'ckeditor5/src/ui.js';
import type { Locale } from 'ckeditor5/src/utils.js';
import type { EditingView } from 'ckeditor5/src/engine.js';
import '../theme/classiceditor.css';
/**
 * Classic editor UI view. Uses an inline editable and a sticky toolbar, all
 * enclosed in a boxed UI view.
 */
export default class ClassicEditorUIView extends BoxedEditorUIView {
    /**
     * Sticky panel view instance. This is a parent view of a {@link #toolbar}
     * that makes toolbar sticky.
     */
    readonly stickyPanel: StickyPanelView;
    /**
     * Toolbar view instance.
     */
    readonly toolbar: ToolbarView;
    /**
     * Menu bar view instance.
     */
    readonly menuBarView?: MenuBarView;
    /**
     * Editable UI view.
     */
    readonly editable: InlineEditableUIView;
    /**
     * Creates an instance of the classic editor UI view.
     *
     * @param locale The {@link module:core/editor/editor~Editor#locale} instance.
     * @param editingView The editing view instance this view is related to.
     * @param options Configuration options for the view instance.
     * @param options.shouldToolbarGroupWhenFull When set `true` enables automatic items grouping
     * in the main {@link module:editor-classic/classiceditoruiview~ClassicEditorUIView#toolbar toolbar}.
     * See {@link module:ui/toolbar/toolbarview~ToolbarOptions#shouldGroupWhenFull} to learn more.
     */
    constructor(locale: Locale, editingView: EditingView, options?: {
        shouldToolbarGroupWhenFull?: boolean;
        useMenuBar?: boolean;
    });
    /**
     * @inheritDoc
     */
    render(): void;
}
