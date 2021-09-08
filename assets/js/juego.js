/**
 * 2C = two of Clubs (Treboles)
 * 2D = two of Diamonds(Diamante)
 * 2H = two of Hearts (Corazones)
 * 2S = two of Spades (Espada)
 */

//Modulo 6
//Funciones anonimas

const miModulo = (() => {
    'use strict'

    let deck = [];

    const tipos = ['C','D','H','S'],
         especiales = ['A','J','Q','K'];

    //let puntoJugador = 0,
       // puntoComputadora = 0;

    let puntosJugadores = [];

    //Referencias de HTML

    const btnPedir = document.querySelector('#btnPedir'),
            btnNuevo = document.querySelector('#btnNuevo'),
            btnDetener = document.querySelector('#btnDetener'),
            etiquetaSmall = document.querySelectorAll('small'),
            divCartasJugadores = document.querySelectorAll('.divCartas');

    // Esta funcion inicia el juego
    const inicializarJuego = ( numJugadores = 2) => {
        deck = crearDeck();

        puntosJugadores = [];
        for( let i = 0; i< numJugadores; i++ )
        {
            puntosJugadores.push(0);
        }

        etiquetaSmall.forEach( elem => elem.innerText = '');

        divCartasJugadores.forEach( elem => elem.innerText = '');

        btnPedir.disabled = false;
        btnDetener.disabled = false;
        
    }

    //Esta funcion crea un nuevo deck
    const crearDeck = () => {

        deck = [];
        for( let i = 2; i <= 10; i++)
        {
            for( let tipo of tipos)
            {
                deck.push(i + tipo);
            }
            
        }
        for( let tipo of tipos)
        {
            for( let esp of especiales)
            {
                deck.push(esp + tipo);
            }     
        }
        //console.log(deck);
        
        //console.log(deck);
        return _.shuffle(deck);
    }


    //Esta funcion me permite tomaruna carta

    const pedirCarta = () => {

        if(deck.length === 0)
        {
            throw 'Ya no hay cartas wey';
        }
        
        //console.log(deck);
        //console.log(carta);

        return deck.pop();
    }

    //pedirCarta();

    const valorCarta = ( carta ) => {
        const valor = carta.substring(0, carta.length -1);

        //Esto es el codigo mejorado o resumido
        return (isNaN( valor )) ? (valor === 'A') ? 11 : 10 : valor * 1;

    }

    //turno: 0 = primer y el ultimo sera la computadora
    const acumularPuntos = ( carta, turno ) => {

        puntosJugadores[turno] = puntosJugadores[turno] + valorCarta( carta );
        etiquetaSmall[turno].innerText = puntosJugadores[turno];
        return puntosJugadores[turno];


    }

    //crear Carta 

    const crearCarta = ( carta, turno) => {

        const imgCarta = document.createElement('img');
        imgCarta.src = `assets/cartas/${ carta }.png`;
        imgCarta.classList.add('carta');
        divCartasJugadores[turno].append( imgCarta );

    }
    //DEterminar el ganador

    const determinarGanador = () => {
        const [ puntosMinimos, puntoComputadora] = puntosJugadores;

        setTimeout(() => {
            ( puntosMinimos === puntoComputadora ) ? 
                alert('Empate Hombre Tio, Tus Puntos Son Iguales Al Oponente')
                
            :  ( puntosMinimos > 21 ) ?
                alert('Has Perdido Tio, Tus Puntos Superan Al Oponente')

            : ( puntoComputadora > 21 ) ?
                alert('Has Ganado Tio, Tus Puntos Son acertados')

            : alert('Has Perdido Tio');
        }, 200 );
    }
    //Turno de computadora

    const turnoComputadora = (puntosMinimos) => {

        let puntoComputadora = 0;
        do {            
            const carta = pedirCarta();

            puntoComputadora = acumularPuntos(carta, puntosJugadores.length -1);
            crearCarta(carta, puntosJugadores.length -1);

        } while ( (puntoComputadora < puntosMinimos) && (puntosMinimos <= 21) );        
        
        determinarGanador();
    }

    //Eventos

    btnPedir.addEventListener('click', () => {

        const carta = pedirCarta();
        const puntoJugador = acumularPuntos(carta, 0);

        crearCarta( carta, 0 );

        return (puntoJugador > 21) ? 
                    [btnPedir.disabled = true,
                    console.warn('Has perdido tio'),
                    btnDetener.disabled = true,
                    turnoComputadora( puntoJugador )]
                :
                (puntoJugador === 21) ?
                    [btnPedir.disabled = true,
                    btnDetener.disabled = true,
                    console.warn('21, Genial'),
                    turnoComputadora( puntoJugador )] 
                : 0;

    });

    btnDetener.addEventListener('click', () => {
    
        btnDetener.disabled = true;
        btnPedir.disabled = true;
        turnoComputadora( puntosJugadores[0] );

    });

    btnNuevo.addEventListener('click', () => {
        console.clear();
        inicializarJuego();

    });


    return {
        nuevoJuego : inicializarJuego
    };
})();