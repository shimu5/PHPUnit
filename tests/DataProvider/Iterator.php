<?php


namespace DataProvider;


Interface Iterator {
    /* Methods */
    abstract public current ( void ) : mixed;
abstract public key ( void ) : scalar;
abstract public next ( void ) : void;
abstract public rewind ( void ) : void;
abstract public valid ( void ) : bool;
}