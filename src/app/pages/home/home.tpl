
        <div class="container-fluid content">
            <form class="form-inline my-2 my-lg-0 w-100 searchbar-form">
                <input class="form-control mr-sm-2 searchbar" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <table>
            {foreach from=$list item=item}
                <tr>
                    <td>{$item.code}</td>
                    <td>{$item.nom}</td>
                    <td>{$item.element}</td>
                    <td>{$item.yin}</td>
                </tr>
            {/foreach}
        </table>