import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'converter'
})
export class ConverterPipe implements PipeTransform {

  transform(value: number,type:string): number {
    switch(type){
      case 'mdl':
        return value*1;
        case 'usd':
          return value/19.16;
          case 'eur':
            return value/19.45;
            case 'btc':
              return value/(19.16*0.000043);
              case 'eth':
                return value/(19.16*0.00052);
                default:
                  throw new Error('Pipe not working')
    }
    return 0;
  }

}
