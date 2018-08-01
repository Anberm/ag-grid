<?php
$pageTitle = "Printing: Core Feature of our Datagrid";
$pageDescription = "ag-Grid is a feature-rich data grid supporting major JavaScript Frameworks. One such feature is Layout For Print. Use For Print to have the grid render without using any scrollbars. This is useful for printing the grid, where all rows should be printed, not just what's visible on the screen. Version 17 is available for download now, take it for a free two month trial.";
$pageKeyboards = "ag-Grid Printing";
$pageGroup = "feature";
include '../documentation-main/documentation_header.php';
?>

    <h1>Printing</h1>

    <p class="lead">
        This section explains how to user the Print Layout feature of the grid.
    </p>

    <p>
        A grid using print layout will not use any scrollbars so all rows and columns
        will get printed. The grid will auto-size width and height to fit all contents.
        This means if the grid is printed on paper all the cells will get included,
        as apposed to printing a grid with scrollbars and only cells within the visible
        area will get printed.
    </p>

    <p>
        The example below shows print layout. The following can be noted:
        <ul>
            <li>
                Pressing the button 'Printer Friendly Layout' turns the grid
                into print layout and removes all scrolls.
            </li>
            <li>
                Pressing the button 'Normal Layout' returns the grid back
                to normal.
            </li>
        </ul>
    </p>

    <?= example('For Print Simple', 'for-print-simple', 'generated') ?>

    <h2>Toggling Print Layout</h2>

    <p>
        Print layout can be turned on by setting the property <code>domLayout='print'</code>
        or by calling the grid API <code>setDomLayout('print')</code>. Similarly the layout
        can be set back to normal by unsetting the <code>domLayout</code> property or
        calling the grid API <code>setDomLayout(null)</code>.
    </p>

<snippet>
    // setting the grid layout to 'print'
    api.setDomLayout('print');

    // resetting the layout back to normal
    api.setDomLayout(null);
</snippet>

    <h2>Toggling Grid Size</h2>

    <p>
        The grid width and height will adjust automatically to fit the contents of all cells.
        For this to work the application should <b>not</b> set a width or height onto the grid component.
        If using print layout, make sure you have no width or height set for the grid.
    </p>

    <p>
        For the grid width to fit, you need a CSS 'display' property capable of dynamic width.
        For example, the default display for a div is <code>block</code> which results in 100%
        width for the div. This will limit the grids width to the width of the browser.
        Changing the display to <code>inline-block</code> for example fixes this and will allow
        the grid to extend past the boundaries of the browser.
    </p>

    <p>
        All the examples on this page do the following when in print layout:
        <ul>
            <li>CSS width and height settings are removed.</li>
            <li>CSS display is set to 'inline-block'.</li>
        </ul>
    </p>

    <h2>Page Break</h2>

    <p>
        When in print layout all cells will have the CSS property <code>page-break-inside: avoid</code>
        so cells will not be split across pages (eg the top half of the cell on one printed page with the
        other half on another printed page).
    </p>

    <h2>Detailed Printing Example</h2>

    <p>
        Below shows a more detailed example and also automatically shows the print dialog.
        From the example, the following can be noted:
        <ul>
            <li>
                When 'Print' is pressed, the grid will do the following:
                <ul>
                    <li>Set the grid into print layout.</li>
                    <li>Remove the height and width settings from the grid to allow the grid to auto-fit it's size.</li>
                    <li>Wait for two seconds (to allow the browser to redraw with the new settings) and
                        then bring up the print dialog.</li>
                    <li>Set the grid back to normal when the print dialog is closed.</li>
                </ul>
            </li>
            <li>
                The first column 'ID' is pinned. When in print layout, the column is not pinned
                as pinning makes no sense when there are no horizontal scrolls.
            </li>
            <li>
                The data is grouped and the group row spans the width of the grid. This group row
                is included in print layout as normal.
            </li>
        </ul>
    </p>

    <?= example('For Print Complex', 'for-print-complex', 'generated', array("enterprise" => 1)) ?>

    <h2>Animations & Redraw</h2>

    <p>
        When the grid is in print layout, the grid does <b>not</b> use absolute positioning for the rows,
        rather the rows are laid out using normal flow. In other words normally the grid places each row
        using exact pixel positioning - this makes things such as animation possible where the grid changes
        the pixel position and uses CSS transition for the row to move to the new location. When in print
        mode, the rows are laid out in the order they appear in the dom - this makes things such as page
        breaks possible but removes the possibility of animations.
    </p>

    <p>
        When in print layout the grid will redraw the entire grid any time there is a change to the rows.
        If just one row is added / removed, or a filter or sort is applied, the entire DOM is removed and
        all rows are inserted again rom top to bottom. This makes print layout best for non-interactive
        grids (ie for printing) as you will loose animations and changes to the grid will be expensive
        (the grid redraws everything on every change).
    </p>

    <h2>Don't Print Large Data</h2>

    <p>
        Do not use this technique for printing if you are showing a large number of rows or columns.
        This is not a problem with the grid, it is a limitation on browsers on how much data they can
        easily display in one web page. If you try to render lots of data into the web page, the web page
        will inevitably. ag-Grid normally gets around this problem by virtualising the rows and columns.
    </p>

    <p>
        If you want to allow printing large data sets it's best to get your users to export to CSV or Excel
        and then print from another non-web based application.
    </p>

    <h2>Don't Play with Print Layout Grids!</h2>

    <p>
        When the grid is in print layout, it will be rendering all cells without using row virtualisation.
        This means that the grid will be slower given the amount of DOM it is rendering. Only use
        print layout when you actually want to print. All of the functions (filtering, sorting, dragging columns
        etc) will work, however the performance will be impacted if the data set is large and will frustrate
        your users. For this reason it's best keeping print layout for when you actually want to print.
    </p>

<?php include '../documentation-main/documentation_footer.php';?>